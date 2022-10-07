@props(['lable' => '', 'name', 'selected' => '', 'options' => []])

<div class="form-group">
<div class="col">
    <label for="recipient-name" class="col-form-label">{{ __($lable) }}</label>
    <select name="{{ $name }}" {{ $attributes->class(['form-select form-select-lg mb-3', 'is-invalid' => $errors->has($name)]) }}>
        <option value="">{{ __('Choose from the list') }}</option>

        @foreach ($options as $item)
            <option value="{{ $item->id }}" {{ $item->id == old($name, $selected) ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
    @error($name)
        <b class="invalid-feedback">
            {{ $message }}
        </b>
    @enderror
</div>
</div>
