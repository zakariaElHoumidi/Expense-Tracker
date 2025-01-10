<?php

namespace App\View\Components\Core;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public User $user;
    public array $links;

    public function __construct() {
        $this->user = auth()->user();
        $this->buildLinks();
    }

    public function buildLinks(): void
    {
        $links = [
            [
                'is_dropdown' => false,
                'label' => 'Home',
                'route' => route('home'),
                'active' => request()->routeIs(route('home'))
            ],
            [
                'is_dropdown' => true,
                'routes' => [
                    [
                        'label' => 'Profile',
                        'route' => route('profile.index'),
                        'active' => request()->routeIs(route('profile.index'))
                    ],
                    [
                        'label' => 'Logout',
                        'route' => route('logout'),
                        'active' => request()->routeIs(route('logout'))
                    ],
                ]
            ]
        ];

        $this->links = $links;
    }
    public function render(): View
    {
        return view('components.core.header');
    }
}
