<?php

namespace App\Http\Livewire\Admin\Profile;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $image;
    public $state = [];

    public function mount()
    {
        $this->state = auth()->user()->only([
            'id', 'name', 'email', 'tgl_lahir', 'tahun_kader', 'pendidikan', 'tahun_pelatihan', 'no_hp'
        ]);
        // dd($this->state);
        // dd($user);
    }
    public function updateProfile(UpdatesUserProfileInformation $updater)
    {
        // dd($this->state);
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->state['id'],
            'tgl_lahir' => 'required',
            'tahun_kader' => 'required',
            'pendidikan' => 'required|in:SD,SMP,SMA,D1,D2,D3,D4,S1,S2',
            'tahun_pelatihan' => 'required',
            'no_hp' => 'required',
        ])->validate();

        // dd($validateData);
        auth()->user()->update($validateData);
        $this->emit('nameChanged', auth()->user()->name);

        $this->dispatchBrowserEvent('alert', ['message' => "Profile updated successfully!"]);
    }
    public function updatedImage()
    {

        $path = $this->image->store('/', 'avatars');

        if ($this->image) {
            Storage::disk('avatars')->delete(auth()->user()->avatar);
        }
        auth()->user()->update(['avatar' => $path]);

        $this->dispatchBrowserEvent('alert', ['message' => "Profile changed successfully!"]);
        $this->reset();
    }
    // protected function cleanupOldUploads()
    // {
    //     $storage = Storage::disk('local');

    //     dd($storage->allFiles('livewire-tmp'));
    //     foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
    //         // On busy websites, this cleanup code can run in multiple threads causing part of the output
    //         // of allFiles() to have already been deleted by another thread.
    //         if (!$storage->exists($filePathname)) continue;

    //         $yesterdaysStamp = now()->subHour(12)->timestamp;
    //         if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
    //             $storage->delete($filePathname);
    //         }
    //     }
    // }
    public function render()
    {
        return view('livewire.admin.profile.update-profile');
    }
}
