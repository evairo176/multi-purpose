<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointments;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class UpdateAppointmentForm extends Component
{
    public $state = [];
    public $appointment;
    public function mount($id)
    {
        $this->state = Appointments::where('id', $id)->first()->toArray();
        $this->appointment = Appointments::where('id', $id)->first();
        // dd($this->state);
    }
    public function updateAppointment()
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
        $this->appointment->update($validateData);
        $this->dispatchBrowserEvent('alert', ['message' => 'User added successfully!']);
        // $this->dispatchBrowserEvent('alert', ['message', 'Appointment added successfully!']);
    }
    public function render()
    {
        $clients = Client::all();
        $data = [
            'clients' => $clients,
            'title' => 'Update Appointment',
        ];
        return view('livewire.admin.appointments.update-appointment-form', $data);
    }
}
