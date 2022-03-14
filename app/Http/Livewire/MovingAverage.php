<?php

namespace App\Http\Livewire;

use App\Models\tb_moving_average;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class MovingAverage extends Component
{
    public $state = [];
    public $index_1;
    public $index_2;
    public $index_3;
    public $index_4;
    public $index_5;
    public $index_6;
    public $index_7;
    public $index_8;
    public $index_9;
    public $index_10;
    public $index_11;
    public $index_12;
    public $datas;
    public $generate = false;

    public function mount()
    {
        $index_1_i = DB::table('tb_moving_average')
            ->where('id', '1')
            ->first();
        $index_2_i = DB::table('tb_moving_average')
            ->where('id', '2')
            ->first();
        $index_3_i = DB::table('tb_moving_average')
            ->where('id', '3')
            ->first();
        $index_4_i = DB::table('tb_moving_average')
            ->where('id', '4')
            ->first();
        $index_5_i = DB::table('tb_moving_average')
            ->where('id', '5')
            ->first();
        $index_6_i = DB::table('tb_moving_average')
            ->where('id', '6')
            ->first();
        $index_7_i = DB::table('tb_moving_average')
            ->where('id', '7')
            ->first();
        $index_8_i = DB::table('tb_moving_average')
            ->where('id', '8')
            ->first();
        $index_9_i = DB::table('tb_moving_average')
            ->where('id', '9')
            ->first();
        $index_10_i = DB::table('tb_moving_average')
            ->where('id', '10')
            ->first();
        $index_11_i = DB::table('tb_moving_average')
            ->where('id', '11')
            ->first();
        $index_12_i = DB::table('tb_moving_average')
            ->where('id', '12')
            ->first();
        // dd($index_12_i);
        $this->index_1 = $index_1_i->pa;
        $this->index_2 = $index_2_i->pa;
        $this->index_3 = $index_3_i->pa;
        $this->index_4 = $index_4_i->pa;
        $this->index_5 = $index_5_i->pa;
        $this->index_6 = $index_6_i->pa;
        $this->index_7 = $index_7_i->pa;
        $this->index_8 = $index_8_i->pa;
        $this->index_9 = $index_9_i->pa;
        $this->index_10 = $index_10_i->pa;
        $this->index_11 = $index_11_i->pa;
        $this->index_12 = $index_12_i->pa;
    }
    public function edit($id)
    {
        $this->showEditModal = true;
        $this->dispatchBrowserEvent('show-form');
        $this->datas = tb_moving_average::where('id', $id)->first();
        $this->state = tb_moving_average::where('id', $id)->first()->toArray();
        // dd($this->state);
    }
    public function UpdateData()
    {
        $validateData = Validator::make($this->state, [
            'pa' => 'required',
        ])->validate();

        $this->datas->update($validateData);
        $this->dispatchBrowserEvent('show-chart');
        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']);
    }
    public function render()
    {
        $data = tb_moving_average::all();
        return view('livewire.moving-average', [
            'data' => $data
        ]);
    }
    public function generateMovingAverage()
    {
        $this->dispatchBrowserEvent('show-chart');
        $this->generate = true;
    }
}
