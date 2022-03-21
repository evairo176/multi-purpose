<?php

namespace App\Http\Livewire\Admin\Profile;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $image;

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
