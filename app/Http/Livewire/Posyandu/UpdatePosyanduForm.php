<?php

namespace App\Http\Livewire\Posyandu;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Posyandu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UpdatePosyanduForm extends Component
{
    public $longtitude;
    public $lattitude;
    public $name_posyandu;
    public $id_kecamatan;
    public $id_desa;
    public $geoJson;
    public $showEditModal = false;
    public $posyandu;
    public $id_posyandu;
    public function mount($id)
    {
        $posyandu = Posyandu::where('id', $id)->first()->toArray();
        $this->id_posyandu = $posyandu['id'];
        $this->id_kecamatan = $posyandu['id_kecamatan'];
        $this->id_desa = $posyandu['id_desa'];
        $this->longtitude = $posyandu['longtitude'];
        $this->lattitude = $posyandu['lattitude'];
        $this->name_posyandu = $posyandu['name_posyandu'];

        // dd($posyandu);
        $this->posyandu = Posyandu::where('id', $id)->first();
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
    public function updatePosyandu()
    {
        // dd($this->state);
        $this->validate([
            'id_kecamatan' => 'required',
            'id_desa' => 'required',
            'longtitude' => 'required',
            'lattitude' => 'required',
            'name_posyandu' => 'required',
        ]);

        $data =  Posyandu::find($this->id_posyandu);
        $query = [
            'id_kecamatan' => $this->id_kecamatan,
            'id_desa' => $this->id_desa,
            'longtitude' => $this->longtitude,
            'lattitude' => $this->lattitude,
            'name_posyandu' => $this->name_posyandu,
        ];
        $data->update($query);
        $this->dispatchBrowserEvent('alert', ['message' => 'Posyandu updated successfully!']);
        // $this->dispatchBrowserEvent('alert', ['message', 'Appointment added successfully!']);
    }
    public function render()
    {

        $this->loadLocation();
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();
        return view('livewire.posyandu.update-posyandu-form', [
            'kecamatans' => $kecamatans,
            'desas' => $desas
        ]);
    }
}
