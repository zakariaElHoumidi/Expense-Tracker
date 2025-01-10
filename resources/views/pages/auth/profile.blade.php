@extends('layouts.profile')

@section('sous-content')
    <div class="py-3">
        <h3 class="mb-4">Update Info</h3>

        <div class="card p-4 shadow-sm">
            <livewire:profile.change-info />
        </div>

        <div class="card p-4 shadow-sm mt-4">
            <livewire:auth.password.update-password />
        </div>
    </div>
@endsection
