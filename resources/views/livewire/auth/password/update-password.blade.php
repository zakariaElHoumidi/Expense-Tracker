<div>
    @if(session()->has('success'))
        <div class="alert alert-success mb-2" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Password Actuelle --}}
    <div class="row mb-3">
        <label for="current_password" class="col-md-4 col-form-label text-md-end">Current Password</label>

        <div class="col-md-6">
            <input id="current_password"
                   type="password"
                   class="form-control shadow-sm @error('current_password') is-invalid @enderror"
                   name="current_password"
                   value="{{ old('current_password') }}"
                   required
                   placeholder="Current Password"
                   wire:model.lazy="current_password"
                   autocomplete="current_password">

            @error('current_password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- New Password --}}
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">New Password</label>

        <div class="col-md-6">
            <input id="password"
                   type="password"
                   class="form-control shadow-sm @error('password') is-invalid @enderror"
                   name="password"
                   required
                   placeholder="New Password"
                   wire:model.lazy="password"
                   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Confirm New Actuelle --}}
    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmation new Password</label>

        <div class="col-md-6">
            <input id="password-confirm"
                   type="password"
                   class="form-control shadow-sm"
                   name="password_confirmation"
                   required
                   placeholder="Confirmation new Password"
                   wire:model.lazy="password_confirmation"
                   autocomplete="new-password">
        </div>
    </div>

    {{-- Button --}}
    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button wire:click="updatePassword" class="btn btn-primary">
                Update Password
            </button>
        </div>
    </div>
</div>
