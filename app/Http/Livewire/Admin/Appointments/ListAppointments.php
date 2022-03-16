<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Appointments;

class ListAppointments extends AdminComponent
{
    protected $listeners = [
        'deleteConfirmed' => 'deleteAppointment'
    ];
    protected $queryString = ['status'];
    public $state = [];
    public $showEditModal = false;
    public $appointment;
    public $appointmentIdBeingRemoved = null;
    public $loadMore = 5;
    public $sumAppointment;
    public $status = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function addLoadMore()
    {
        // dd('da');

        if ($this->sumAppointment > $this->loadMore) {
            $this->loadMore *= 2;
        }
        $this->loadMore = 0;
    }
    public function confirmAppointmentRemoval($id)
    {
        $this->appointmentIdBeingRemoved = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }
    public function deleteAppointment()
    {
        $appointment = Appointments::findOrFail($this->appointmentIdBeingRemoved);
        $appointment->delete();
        $this->dispatchBrowserEvent('alert', ['message' => 'Appointment delete successfully!']);
    }

    public function filterByStatus($status = null)
    {
        $this->resetPage();
        $this->status = $status;
    }

    public function render()
    {
        $appointments = Appointments::with('client')
            ->when($this->status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate($this->loadMore);
        $appointmentsCount = Appointments::count();
        $scheduledAppointmentCount = Appointments::where('status', 'SCHEDULED')->count();
        $closedAppointmentCount = Appointments::where('status', 'CLOSED')->count();
        $this->sumAppointment = $appointmentsCount;
        return view('livewire.admin.appointments.list-appointments', [
            'appointments' => $appointments,
            'appointmentsCount' => $appointmentsCount,
            'scheduledAppointmentCount' => $scheduledAppointmentCount,
            'closedAppointmentCount' => $closedAppointmentCount
        ]);
    }
}
