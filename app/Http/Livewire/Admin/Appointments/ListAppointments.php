<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Appointments;

class ListAppointments extends AdminComponent
{
    public $state = [];
    public $showEditModal = false;
    public $appointment;
    public $userIdBeingRemoved = null;
    public $loadMore = 5;
    public $sumAppointment;

    public function addLoadMore()
    {
        // dd('da');

        if ($this->sumUser > $this->loadMore) {
            $this->loadMore *= 2;
        }
        $this->loadMore = 0;
    }
    public function addNew()
    {
        $this->state = [];
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('show-form');
    }
    public function render()
    {
        $appointments = Appointments::latest()->paginate($this->loadMore);
        return view('livewire.admin.appointments.list-appointments', [
            'appointments' => $appointments
        ]);
    }
}
