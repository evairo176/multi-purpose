<?php

namespace App\Http\Livewire\Posyandu;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Posyandu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListPosyandu extends AdminComponent
{
    public $showEditModal = false;
    public $sumPosyandu;
    public $loadMore = 5;
    public $search = null;
    public $posyanduIdBeingRemoved = null;

    public function addLoadMore()
    {
        // dd('da');
        if ($this->sumPosyandu > $this->loadMore) {
            $this->loadMore *= 2;
        }
        $this->loadMore = 0;
    }
    public function addNew()
    {
        $this->reset();
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }
    public function confirmationDeletePosyandu($id)
    {
        $this->posyanduIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function delete()
    {
        $posyandu = Posyandu::findOrFail($this->posyanduIdBeingRemoved);
        // dd($kecamatan);
        $posyandu->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Posyandu Delete successfully!']);
    }
    private function loadLocation()
    {
        $locations = DB::table('posyandu')
        ->leftJoin('kecamatan', 'posyandu.id_kecamatan', '=', 'kecamatan.id')
        ->leftJoin('desa', 'posyandu.id_desa', '=', 'desa.id')
        ->select(
            'posyandu.*',
            'kecamatan.*',
            'desa.*',
            'posyandu.id as id_posyandu',
        )
        ->orderBy('posyandu.created_at', 'desc')->get();
        // dd($locations);
        $customLocation = [];

        foreach ($locations as $location) {
            $customLocation[] = [
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$location->longtitude, $location->lattitude],
                    'type' => 'Point'
                ],
                'properties' => [
                    'locationId' => $location->id_posyandu,
                    "title" => $location->name_posyandu,
                    "name_kecamatan" => $location->name_kecamatan,
                    "name_desa" => $location->name_desa,
                ]
            ];
        }

        $geoLocation = [
            'type' => 'FeatureCollection',
            'features' => $customLocation
        ];

        $geoJson = collect($geoLocation)->toJson();
        $this->geoJson = $geoJson;
        // dd($this->geoJson);
    }
    public function render()
    {
        $this->loadLocation();
        $posyandus = Posyandu::query()
        ->leftJoin('kecamatan', 'posyandu.id_kecamatan', '=', 'kecamatan.id')
        ->leftJoin('desa', 'posyandu.id_desa', '=', 'desa.id')
        ->select(
            'posyandu.*',
            'kecamatan.*',
            'desa.*',
            'posyandu.id as id_posyandu',
        )
        ->where('name_posyandu', 'like', '%' . $this->search . '%')
        ->orWhere('name_kecamatan', 'like', '%' . $this->search . '%')
        ->orWhere('name_desa', 'like', '%' . $this->search . '%')
        ->orderBy('posyandu.created_at','desc')
        ->paginate($this->loadMore);
        // dd($posyandus);
        $this->sumPosyandu = Posyandu::count();
        return view('livewire.posyandu.list-posyandu',[
            'posyandus' => $posyandus
        ]);
    }
}
