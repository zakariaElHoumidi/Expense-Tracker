@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    <livewire:auth.password.reset :email="$email" :token="$token"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
