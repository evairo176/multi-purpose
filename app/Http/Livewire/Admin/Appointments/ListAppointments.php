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
    public $selectedRows = [];
    public $selectPageRows = false;

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
    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->appointments->pluck('id')
                ->map(function ($id) {
                    return (string) $id;
                });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
        // dd($this->selectedRows);
    }
    public function getAppointmentsProperty()
    {
        return Appointments::with('client')
            ->when($this->status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate($this->loadMore);
    }
    public function deleteSelectedRows()
    {
        Appointments::whereIn('id', $this->selectedRows)->delete();
        $this->dispatchBrowserEvent('alert', ['message' => 'All selected appointment got delete.']);
        $this->reset(['selectedRows', 'selectPageRows']);
    }
    public function markAsScheduled()
    {
        Appointments::whereIn('id', $this->selectedRows)->update(['status' => 'SCHEDULED']);
        $this->dispatchBrowserEvent('alert', ['message' => 'Appointment mark as scheduled has updated.']);
        $this->reset(['selectedRows', 'selectPageRows']);
    }
    public function markAsClosed()
    {
        Appointments::whereIn('id', $this->selectedRows)->update(['status' => 'CLOSED']);
        $this->dispatchBrowserEvent('alert', ['message' => 'Appointment mark as closed has updated.']);
        $this->reset(['selectedRows', 'selectPageRows']);
    }
    public function render()
    {
        $appointments = $this->appointments;
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
