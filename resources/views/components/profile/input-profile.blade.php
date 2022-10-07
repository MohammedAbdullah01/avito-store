@props(['name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'lable' => ''])

<div class="form-group">
    <label class="col-md-4 col-lg-3 col-form-label">{{ __($lable) }}</label>
    <div class="col-md-8 col-lg-9">
        <input name="{{ $name }}" type="{{ $type }}"
            {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}
            value="{{ old($name, $value) }}" placeholder="{{ __($placeholder) }}">
        @error($name)
            <b class="invalid-feedback">
                {{ $message }}
            </b>
        @enderror
    </div>
</div>
