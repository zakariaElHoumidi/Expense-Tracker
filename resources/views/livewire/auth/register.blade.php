<div>
    {{-- First Name --}}
    <div class="row mb-3">
        <label for="firstname" class="col-md-4 col-form-label text-md-end">First Name</label>

        <div class="col-md-6">
            <input id="firstname"
                   type="text"
                   class="form-control shadow-sm @error('firstname') is-invalid @enderror"
                   name="firstname"
                   value="{{ old('firstname') }}"
                   required
                   placeholder="First Name"
                   wire:model.lazy="firstname"
                   autocomplete="firstname"
                   autofocus>

            @error('firstname')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Last Name --}}
    <div class="row mb-3">
        <label for="lastname" class="col-md-4 col-form-label text-md-end">Last Name</label>

        <div class="col-md-6">
            <input id="lastname"
                   type="text"
                   class="form-control shadow-sm @error('lastname') is-invalid @enderror"
                   name="lastname"
                   value="{{ old('lastname') }}"
                   required
                   placeholder="Last Name"
                   wire:model.lazy="lastname"
                   autocomplete="lastname">

            @error('lastname')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Email --}}
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Address Email</label>

        <div class="col-md-6">
            <input id="email"
                   type="email"
                   class="form-control shadow-sm @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Address Email"
                   wire:model.lazy="email"
                   required
                   autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Password --}}
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

        <div class="col-md-6">
            <input id="password"
                   type="password"
                   class="form-control shadow-sm @error('password') is-invalid @enderror"
                   name="password"
                   placeholder="Password"
                   wire:model.lazy="password"
                   required
                   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    {{-- Confirm Password --}}
    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm"
                   type="password"
                   class="form-control shadow-sm"
                   name="password_confirmation"
                   placeholder="Confirm Password"
                   wire:model.lazy="password_confirmation"
                   required
                   autocomplete="new-password">
        </div>
    </div>

    {{-- Button --}}
    <div class="row mb-0">
        <div class="col-md-4"></div>

        <div class="col-md-6 d-flex align-items-center justify-content-between">
            <a href="{{ route('login') }}" wire:navigate class="btn btn-outline-primary">
                Login
            </a>

            <button wire:click="registerUser" class="btn btn-primary">
                Create Account
            </button>
        </div>
    </div>
</div>
