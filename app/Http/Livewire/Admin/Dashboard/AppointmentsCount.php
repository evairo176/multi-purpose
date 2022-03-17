<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Appointments;
use Livewire\Component;

class AppointmentsCount extends Component
{
    public $appointmentsCount;
    public function mount()
    {
        $this->getAppointmensCount();
    }
    public function getAppointmensCount($status = null)
    {
        $this->appointmentsCount = Appointments::query()
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->count();
        // dd($status);
    }
    public function render()
    {
        return view('livewire.admin.dashboard.appointments-count');
    }
}
