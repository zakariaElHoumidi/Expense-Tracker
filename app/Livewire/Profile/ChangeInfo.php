<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChangeInfo extends Component
{
    #[Validate('required|between:3,25')]
    public string $firstname;
    #[Validate('required|between:3,25')]
    public string $lastname;
    #[Validate('required|email|between:5,64|unique:users,email')]
    public string $email;
    #[Validate('required|between:8,64')]
    public string $password;

    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();

        $this->firstname = $this->user->firstname;
        $this->lastname = $this->user->lastname;
        $this->email = $this->user->email;
    }

    public function updateData(): void
    {
        $this->validate();

        if (!Hash::check($this->password, $this->user->password)) {
            $this->addError('password', "You can't update your password without current password.");
            return;
        }

        $this->dataUpdate();
    }

    #[Renderless]
    public function dataUpdate(): void
    {
        $this->user->firstname = $this->firstname;
        $this->user->lastname = $this->lastname;
        $this->user->email = $this->email;
        $this->user->save();

        session()->flash('success', 'Info updated successfully.');
    }

    public function render(): View
    {
        return view('livewire.profile.change-info');
    }
}
