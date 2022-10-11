@props(['lable' => '', 'name', 'value' => '', 'selected' => ''])

<div class="form-group">
    <select name="{{ $name }}" {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>

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
