@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <livewire:auth.register />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title')
    Register
@endsection
