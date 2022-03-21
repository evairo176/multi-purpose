<?php

namespace App\Http\Livewire\Kecamatan;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Livewire\Component;

class ListKecamatan extends AdminComponent
{
    public $state = [];
    public $search = null;
    public $kecamatan;
    public $sumKecamatan;
    public $loadMore = 5;
    public $showEditModal = false;
    public $kecamatanIdBeingRemoved = null;

    public function addLoadMore()
    {
        // dd('da');

        if ($this->sumKecamatan > $this->loadMore) {
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
    public function createKecamatan()
    {
        $validateData = Validator::make($this->state, [
            'name_kecamatan' => 'required|unique:kecamatan',
        ])->validate();
        $validateData['name_kecamatan'] = strtoupper($this->state['name_kecamatan']);
        Kecamatan::create($validateData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Kecamatan added successfully!']);
    }
    public function edit($id)
    {
        // dd($id);
        $this->reset();
        $this->showEditModal = true;
        $this->dispatchBrowserEvent('show-form');
        $this->kecamatan = Kecamatan::where('id', $id)->first();
        $this->state = Kecamatan::where('id', $id)->first()->toArray();
        // dd($this->state);
    }
    public function updateKecamatan()
    {
        $validateData = Validator::make($this->state, [
            'name_kecamatan' => 'required|unique:kecamatan,name_kecamatan,' . $this->kecamatan->id,
        ])->validate();
        $validateData['name_kecamatan'] = strtoupper($this->state['name_kecamatan']);
        $this->kecamatan->update($validateData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Kecamatan updated successfully!']);
    }
    public function confirmationDeleteUser($id)
    {
        $this->kecamatanIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function delete()
    {
        $kecamatan = Kecamatan::findOrFail($this->kecamatanIdBeingRemoved);
        // dd($kecamatan);
        $kecamatan->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Kecamatan Delete successfully!']);
    }
    public function render()
    {
        $kecamatans = Kecamatan::query()
            ->where('id', 'like', '%' . $this->search . '%')
            ->orWhere('name_kecamatan', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->loadMore);
        $this->sumKecamatan = Kecamatan::count();
        return view('livewire.kecamatan.list-kecamatan', [
            'kecamatans' => $kecamatans
        ]);
    }
}
