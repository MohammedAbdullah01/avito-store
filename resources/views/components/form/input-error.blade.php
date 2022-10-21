@props(['name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'lable' => ''])

<div class="form-group">
    <label class="form-label float-start ">{{ __($lable) }}</label>
    <input type="{{ $type }}" {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}
        placeholder="{{ __('Please Enter The ' . $lable) }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @error($name)
        <b class="invalid-feedback">
            {{ $message }}
        </b>
    @enderror
</div>
