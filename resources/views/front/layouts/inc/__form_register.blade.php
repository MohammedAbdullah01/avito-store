
<x-input-error placeholder="Username"         name="name"                    value="{{ old('name') }}"       />

<x-input-error placeholder="Email"            name="email"                   value="{{ old('email') }}"  type="email"    />

<x-input-error placeholder="Password"         name="password"                type="password"                                />

<x-input-error placeholder="Password Confirm" name="password_confirmation"   type="password"                                />

<x-button value="Sign In" />




{{-- <div class="col-12">
    <label class="form-label">{{ __('Your Name') }}</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
    @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">{{ __('Your Email') }}</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
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
    <button class="btn btn-outline-primary btn-sm w-100" type="submit">{{ __('Create Account') }}</button>
</div> --}}
