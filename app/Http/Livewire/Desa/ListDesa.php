<?php

namespace App\Http\Livewire\Desa;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListDesa extends AdminComponent
{
    public $state = [];
    public $search = null;
    public $desa;
    public $sumDesa;
    public $loadMore = 5;
    public $showEditModal = false;
    public $desaIdBeingRemoved = null;

    public function addLoadMore()
    {
        // dd('da');

        if ($this->sumDesa > $this->loadMore) {
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
    public function createDesa()
    {
        $validateData = Validator::make($this->state, [
            'id_kecamatan' => 'required',
            'name_desa' => 'required|unique:desa',
        ])->validate();
        $validateData['id_kecamatan'] = $this->state['id_kecamatan'];
        $validateData['name_desa'] = strtoupper($this->state['name_desa']);
        // dd($validateData);
        Desa::create($validateData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Desa added successfully!']);
    }
    public function edit($id)
    {
        // dd($id);
        $this->reset();
        $this->showEditModal = true;
        $this->dispatchBrowserEvent('show-form');
        $this->desa = Desa::where('id', $id)->first();
        $this->state = Desa::where('id', $id)->first()->toArray();
        // dd($this->state);
    }
    public function updateDesa()
    {
        $validateData = Validator::make($this->state, [
            'id_kecamatan' => 'required',
            'name_desa' => 'required|unique:desa,name_desa,' . $this->desa->id,
        ])->validate();
        $validateData['name_desa'] = strtoupper($this->state['name_desa']);
        $this->desa->update($validateData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Desa updated successfully!']);
    }
    public function confirmationDeleteUser($id)
    {
        $this->desaIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function delete()
    {
        $desa = Desa::findOrFail($this->desaIdBeingRemoved);
        // dd($kecamatan);
        $desa->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Desa Delete successfully!']);
    }
    public function render()
    {
        $desas = Desa::query()
            ->where('id', 'like', '%' . $this->search . '%')
            ->orWhere('name_desa', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->loadMore);
        $kecamatans = Kecamatan::all();
        $this->sumDesa = Desa::count();
        return view('livewire.desa.list-desa', [
            'desas' => $desas,
            'kecamatans' => $kecamatans,
        ]);
    }
}
