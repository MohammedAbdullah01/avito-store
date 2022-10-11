<x-form.input-error name="token" type="hidden" value="{{ $token }}" />

<x-form.input-error placeholder="Email" name="email" type="email" value="{{ $email }}" />

<x-form.input-error placeholder="Password" name="password" type="password" />

<x-form.input-error placeholder="Password Confirm" name="password_confirmation" type="password" />

<x-button value="Save" />


{{-- <div class="col-12">
    <label class="form-label">{{ __('Your Email') }}</label>
    <input type="email" value="{{ $email }}" name="email" class="form-control" required>
    <input type="hidden" value="{{ $token }}" name="token" class="form-control" required>
    @error('email')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">{{ __('Password') }}</label>
    <input type="password" name="password" class="form-control" required>
    @error('password')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">{{ __('Password Confirm') }}</label>
    <input type="password" name="password_confirmation" class="form-control" required>
    @error('password_confirmation')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="col-md-6 mx-auto">
    <button class="btn btn-outline-success btn-sm w-100" type="submit">{{ __('Update') }}</button>
</div> --}}
