<?php

namespace App\Livewire\Auth\Password;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdatePassword extends Component
{
    #[Validate('required|min:8')]
    public string $current_password;
    #[Validate('required|between:8,64|confirmed')]
    public string $password;
    public string $password_confirmation;

    public User $user;

    public function mount(): void {
        $this->user = auth()->user();
    }

    public function updatePassword(): void
    {
        $this->validate();

        if (!Hash::check($this->current_password, $this->user->password)) {
            $this->addError('current_password', 'Wrong Password');
            return;
        }

        $this->user->password = Hash::make($this->password);

        $this->user->save();

        $this->reset([
            'password_confirmation',
            'password',
            'current_password'
        ]);

        session()->flash('success', 'Password changed successfully.');
    }

    public function render(): View
    {
        return view('livewire.auth.password.update-password');
    }
}
