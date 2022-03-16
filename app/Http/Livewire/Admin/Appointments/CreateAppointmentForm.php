<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointments;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateAppointmentForm extends Component
{
    public $state = [
        'status' => 'SCHEDULED'
    ];
    public function createAppointment()
    {
        // dd($this->state);
        $validateData = Validator::make($this->state, [
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
            'status' => 'required|in:SCHEDULED,CLOSED',
        ])->validate();

        // $this->state['status'] = 'open';
        Appointments::create($validateData);
        // $this->dispatchBrowserEvent('hide-form', ['message' => 'User added successfully!']);
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
