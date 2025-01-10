<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Validate('required|email|between:5,64|exists:users,email')]
    public string $email;

    public function sendResetLink(): void
    {
        $this->validate();

        $status = Password::sendResetLink([
            'email' => $this->email,
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            $this->reset([
                'email',
            ]);
            session()->flash('status-success', 'email sent to your email');
        } else {
            session()->flash('status-danger', $status . ' Try again later');
        }
    }

    public function render(): View
    {
        return view('livewire.auth.forgot-password');
    }
}
