<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointments;
use App\Models\Client;
use Livewire\Component;

class CreateAppointmentForm extends Component
{
    public $state = [];
    public function createAppointment()
    {
        // dd($this->state);
        $this->state['status'] = 'open';
        Appointments::create($this->state);

        $this->dispatchBrowserEvent('alert', ['message', 'Appointment added successfully!']);
    }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.create-appointment-form', [
            'clients' => $clients
        ]);
    }
}
