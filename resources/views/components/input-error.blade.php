@props(['name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'lable' => ''])

<div class="form-group">
    <label class="col-form-label ">{{ __($lable) }}</label>
    <input type="{{ $type }}" {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}
        placeholder="{{ __($placeholder) }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @error($name)
        <b class="invalid-feedback">
            {{ $message }}
        </b>
    @enderror
</div>
