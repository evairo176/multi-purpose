<?php

namespace App\Http\Livewire\Posyandu;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Posyandu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListPosyandu extends AdminComponent
{
    // public $state = [];
    public $longtitude;
    public $lattitude;
    public $name_posyandu;
    public $id_kecamatan;
    public $id_desa;
    public $locationId;
    public $idEdit = false;
    public $geoJson;
    public $sumPosyandu;
    public $loadMore = 5;
    public $search = null;


    public function addLoadMore()
    {
        // dd('da');
        if ($this->sumPosyandu > $this->loadMore) {
            $this->loadMore *= 2;
        }
        $this->loadMore = 0;
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
    public function createPosyandu()
    {
        // dd('dad');
        $this->validate([
            'id_kecamatan' => 'required',
            'id_desa' => 'required',
            'longtitude' => 'required',
            'lattitude' => 'required',
            'name_posyandu' => 'required',
        ]);

        Posyandu::create([
            'id_kecamatan' => $this->id_kecamatan,
            'id_desa' => $this->id_desa,
            'longtitude' => $this->longtitude,
            'lattitude' => $this->lattitude,
            'name_posyandu' => $this->name_posyandu,
        ]);
        $this->dispatchBrowserEvent('alert', ['message' => 'Posyandu added successfully!']);
        $this->loadLocation();
        $this->dispatchBrowserEvent('locationAdded', $this->geoJson);
        $this->clearForm();
    }
    public function clearForm()
    {
        // $this->locationId = '';
        $this->longtitude = '';
        $this->lattitude = '';
        $this->name_posyandu = '';
        $this->id_kecamatan = '';
        $this->id_desa = '';
    }
    public function cancelForm()
    {
        $this->clearForm();
        $this->idEdit = false;
    }
    public function findLocationById($id)
    {
        // dd($id);
        $location = Posyandu::findOrFail($id);
        // dd($location);

        $this->locationId = $id;
        $this->longtitude = $location->longtitude;
        $this->lattitude = $location->lattitude;
        $this->name_posyandu = $location->name_posyandu;
        $this->id_kecamatan = $location->id_kecamatan;
        $this->id_desa = $location->id_desa;
        $this->idEdit = true;
    }
    public function edit($id)
    {
        // dd($id);
        // $this->reset();
        $edit = Posyandu::where('id', $id)->first();
        // dd($edit);

        $this->locationId = $id;
        $this->longtitude = $edit->longtitude;
        $this->lattitude = $edit->lattitude;
        $this->name_posyandu = $edit->name_posyandu;
        $this->id_kecamatan = $edit->id_kecamatan;
        $this->id_desa = $edit->id_desa;
        $this->idEdit = true;
    }
    public function updatePosyandu()
    {
        $this->validate([
            'id_kecamatan' => 'required',
            'id_desa' => 'required',
            'longtitude' => 'required',
            'lattitude' => 'required',
            'name_posyandu' => 'required',
        ]);

        $location =  Posyandu::findOrFail($this->locationId);
        $updateData = [
            'id_kecamatan' => $this->id_kecamatan,
            'id_desa' => $this->id_desa,
            'longtitude' => $this->longtitude,
            'lattitude' => $this->lattitude,
            'name_posyandu' => $this->name_posyandu,
        ];
        $location->update($updateData);
        $this->dispatchBrowserEvent('alert', ['message' => "Posyandu {$location->name_posyandu} updated successfully!"]);
        $this->loadLocation();
        $this->dispatchBrowserEvent('updatedLocation', $this->geoJson);
        $this->clearForm();
        $this->idEdit = false;
        // $this->geoJson = '';
    }
    public function deletePosyandu()
    {
        $location =  Posyandu::findOrFail($this->locationId);
        $location->delete();
        $this->idEdit = false;
        $this->dispatchBrowserEvent('alert', ['message' => 'Posyandu Deleted successfully!']);
        $this->loadLocation();
        $this->dispatchBrowserEvent('locationDeleted', $location->id);
        $this->clearForm();
    }
    public function render()
    {
        $this->loadLocation();
        // dd($this->loadLocation());
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
            ->orderBy('posyandu.created_at', 'desc')
            ->paginate($this->loadMore);
        // dd($posyandus);
        $this->sumPosyandu = Posyandu::count();
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();
        return view('livewire.posyandu.list-posyandu', [
            'kecamatans' => $kecamatans,
            'desas' => $desas,
            'posyandus' => $posyandus,
        ]);
    }
}
