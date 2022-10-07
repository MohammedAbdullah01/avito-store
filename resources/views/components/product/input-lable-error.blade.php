@props(['name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'lable' => '' , 'col' =>'col'])

<div class="{{$col}} mb-3">
    <label class="col-form-label ">{{ __($lable) }}</label>
    <input {{ $attributes->class(['form-control ', 'is-invalid' => $errors->has($name)]) }} name="{{ $name }}"
        type="{{ $type }}" value="{{ old($name, $value) }}" placeholder="{{ __($placeholder) }}">
    @error($name)
        <b class="invalid-feedback">
            {{ $message }}
        </b>
    @enderror
</div>
