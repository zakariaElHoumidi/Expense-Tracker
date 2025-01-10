<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(): View
    {
        return view('pages.auth.profile');
    }

    public function deleteAccount(): View
    {
        return view('pages.auth.delete-account');
    }
}
