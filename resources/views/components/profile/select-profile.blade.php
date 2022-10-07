@props(['lable' => '', 'name', 'value' => '', 'selected' => ''])

<div class="row mb-3">
    <label for="recipient-name" class="col-md-4 col-lg-3 col-form-label">{{ __($lable) }}</label>

    <div class="col-md-8 col-lg-9">
        <select name="{{ $name }}"
            {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>

            <option value="">
                {{ __('Choose from the list') }}
            </option>

            <option value="male" {{ $value == 'Male' ? 'selected' : '' }}>
                {{ __('Male') }}
            </option>

            <option value="female" {{ $value == 'Female' ? 'selected' : '' }}>
                {{ __('Female') }}
            </option>

        </select>

        @error($name)
            <b class="invalid-feedback">
                {{ $message }}
            </b>
        @enderror
    </div>
</div>
