<div>
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Address Email</label>

        <div class="col-md-6">
            <input id="email"
                   type="email"
                   class="form-control shadow-sm @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ $email ?? old('email') }}"
                   required
                   placeholder="Address Email"
                   wire:model.lazy="email"
                   autocomplete="email"
                   autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

        <div class="col-md-6">
            <input id="password"
                   type="password"
                   class="form-control shadow-sm @error('password') is-invalid @enderror"
                   name="password"
                   required
                   placeholder="Password"
                   wire:model.lazy="password"
                   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmation Password</label>

        <div class="col-md-6">
            <input id="password-confirm"
                   type="password"
                   class="form-control shadow-sm"
                   name="password_confirmation"
                   required
                   placeholder="Confirmation Password"
                   wire:model.lazy="password_confirmation"
                   autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button wire:click="resetPassword" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </div>
</div>
