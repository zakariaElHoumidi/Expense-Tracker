<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DeleteAccount extends Component
{
    #[Validate('required|between:8,64')]
    public string $password;
    #[Validate('required|email|between:5,64')]
    public string $email;
    public bool $is_agree = false;
    public User $user;

    public function mount(): void {
        $this->user = auth()->user();
    }

    public function deleteAccount(): void
    {
        $this->validate();

        if ($this->user->email !== $this->email) {
            $this->addError('email', 'Wrong Email');
            return;
        }

        if (!Hash::check($this->password, $this->user->password)) {
            $this->addError('password', 'Wrong Password');
            return;
        }

        if (!$this->is_agree) {
            $this->addError('is_agree', 'You must agree first');
            return;
        }

        $this->user->delete();

        Auth::logout();

        $route = route('login');
        $this->redirect($route, navigate: true);
    }

    public function render(): View
    {
        return view('livewire.profile.delete-account');
    }
}
