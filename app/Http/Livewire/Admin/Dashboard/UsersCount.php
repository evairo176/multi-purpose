<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;

class UsersCount extends Component
{
    public $usersCount;
    public function mount()
    {
        $this->getUsersCount();
    }
    public function getUsersCount($options = 'TODAY')
    {
        $this->usersCount = User::query()
            ->whereBetWeen('created_at', $this->getDateRange($options))
            ->count();
        // dd($status);
    }
    public function getDateRange($options)
    {
        // dd($options);
        if ($options == 'TODAY') {
            return [now()->today(), now()];
        }
        if ($options == 'MTD') {
            return [now()->firstOfMonth(), now()];
        }
        if ($options == 'YTD') {
            return [now()->firstOfYear(), now()];
        }
        return [now()->subDay($options), now()];
    }
    public function render()
    {
        return view('livewire.admin.dashboard.users-count');
    }
}
