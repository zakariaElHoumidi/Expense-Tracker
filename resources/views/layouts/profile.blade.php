@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('profile.index') }}" wire:navigate>My Infos</a>
                    </li>
                    @if(!auth()->user()->hasVerifiedEmail())
                        <li class="list-group-item">
                            <a href="{{ route('verification.notice') }}" wire:navigate>Verify Email</a>
                        </li>
                    @endif
                    <li class="list-group-item">
                        <a href="{{ route('profile.delete-account') }}" wire:navigate>Delete Account</a>
                    </li>
                    <li class="list-group-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="border-0 p-0 text-primary bg-white">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="col-md-8">
                @yield('sous-content')
            </div>
        </div>
    </div>
@endsection

@section('title')
    Profile
@endsection
