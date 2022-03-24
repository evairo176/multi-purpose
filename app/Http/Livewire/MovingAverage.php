<?php

namespace App\Http\Livewire;

use App\Models\tb_moving_average;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class MovingAverage extends Component
{
    public $state;
    public $datas;
    public $generate = false;
    public $datag;
    public $edit = [];
    public $dataDefault = [];

    // public function mount()
    // {
    //     $this->loadData()
    // }
    // public function changeDefaultData()
    // {
    //     $dataSemula = [84,81,86,79,82,85,77,83,90,82,85,81];
    //     $
    //     dd($this->dataDefault);
    // }
    public function loadData()
    {
        $this->datag = tb_moving_average::all();
        foreach($this->datag as $data){
            $nilai[] = $data->pa;
        }
        // dd($nilai);
        $this->state = $nilai;

    }
    public function edit($id)
    {
        $this->showEditModal = true;
        $this->dispatchBrowserEvent('show-form');
        $this->datas = tb_moving_average::where('id', $id)->first();
        $this->edit = tb_moving_average::where('id', $id)->first()->toArray();
        // dd($this->state);
    }
    public function UpdateData()
    {
        $validateData = Validator::make($this->edit, [
            'pa' => 'required',
        ])->validate();
        // $this->loadData();
        $this->datas->update($validateData);
        // $this->dispatchBrowserEvent('show-chart');
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']);
        $this->generate = false;
    }
    public function render()
    {
        $this->loadData();
        $data = tb_moving_average::all();
        // dd($data);
        return view('livewire.moving-average', [
            'data' => $data
        ]);
    }
    public function generateMovingAverage()
    {
        $this->dispatchBrowserEvent('show-chart',$this->state);
        $this->generate = true;
    }
}
