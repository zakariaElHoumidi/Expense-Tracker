<div>
    {{-- Email --}}
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Address Email</label>

        <div class="col-md-6">
            <input id="email"
                   type="email"
                   class="form-control shadow-sm @error('email') is-invalid @enderror"
                   name="email"
                   required
                   placeholder="Address Email"
                   wire:model.lazy="email"
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
                   value="{{ old('password') }}"
                   required
                   placeholder="Password"
                   wire:model.lazy="password"
                   autocomplete="password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- Confirm checkbox --}}
    <div class="mb-3 form-check">
        <input type="checkbox"
               class="form-check-input shadow-sm @error('is_agree') is-invalid @enderror"
               id="check"
               wire:model.lazy="is_agree">
        <label class="form-check-label" for="check">Your Account delete after 30day</label>

        @error('is_agree')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Button --}}
    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button wire:click="deleteAccount" class="btn btn-primary">
                Delete Account
            </button>
        </div>
    </div>
</div>
