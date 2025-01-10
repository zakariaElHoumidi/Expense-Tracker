<div>
    @if (session('status-success'))
        <div class="alert alert-success" role="alert">
            {{ session('status-success') }}
        </div>
    @endif

    @if (session('status-danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('status-danger') }}
        </div>
    @endif

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Address Email</label>

        <div class="col-md-6">
            <input id="email"
                   type="email"
                   class="form-control shadow-sm @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
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

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button wire:click="sendResetLink" class="btn btn-primary">
                Send Reset Password Link
            </button>
        </div>
    </div>
</div>
