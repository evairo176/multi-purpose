<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class ListUsers extends AdminComponent
{
    use WithFileUploads;

    public $state = [];
    public $showEditModal = false;
    public $user;
    public $userIdBeingRemoved = null;
    public $loadMore = 5;
    public $sumUser;
    public $search = null;
    public $photo;

    public function updatingSearch()
    {
        $this->resetPage();
    }
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

    public function createUser()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);

        if ($this->photo) {
            $validateData['avatar'] = $this->photo->store('/', 'avatars');
        }

        User::create($validateData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added successfully!']);
    }
    public function edit($id)
    {
        $this->showEditModal = true;
        $this->dispatchBrowserEvent('show-form');
        $this->user = User::where('id', $id)->first();
        $this->state = User::where('id', $id)->first()->toArray();
        // dd($this->state);
    }

    public function updateUser()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();

        if (!empty($validateData['password'])) {
            $validateData['password'] = bcrypt($validateData['password']);
        }
        $this->user->update($validateData);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']);
    }
    public function confirmationDeleteUser($id)
    {
        $this->userIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function delete()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);
        // dd($user);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message', 'User Delete successfully!']);
    }
    public function render()
    {
        // dd($this->searchTerm);
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->loadMore);
        $this->sumUser = User::count();
        return view('livewire.admin.users.list-users', [
            'users' => $users
        ]);
    }
}
