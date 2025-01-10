<?php

namespace App\Livewire\Auth;

use App\Models\ContactInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email|between:5,64')]
    public string $email;

    #[Validate('required|between:8,64')]
    public string $password;

    public string $email_support;

    public bool $remember_me = false;

    public function mount(): void
    {
        $email_support = ContactInfo::where('label', 'email')
            ->where('is_show', 1)
            ->first();

        if ($email_support) {
            $this->email_support = $email_support->value;
        } else {
            $this->email_support = '';
        }
    }

    public function loginUser()
    {
        $this->validate();

        $user = User::withTrashed()
            ->where('email', $this->email)->first();

        if (!$user) {
            return $this->addError('email', 'Email not found');
        }

        if ($user->deleted_at !== null) {
            $this->addError('email',
                'This account has been requested to be deleted. If there is a problem, contact us => ' . ' ' . $this->email_support
            );
            return;
        }

        if (!Hash::check($this->password, $user->password)) {
            return $this->addError('password', 'Wrong password');
        }

        Auth::login($user);

        $login_route = route('home');

        return $this->redirect($login_route, navigate: true);
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
