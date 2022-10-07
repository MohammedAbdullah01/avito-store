@props(['name', 'value' => '', 'lable' => '', 'placeholder' => ''])


<div class="form-group">
    <label class="col-md-4 col-lg-3 col-form-label">
        {{ __($lable) }}
    </label>

    <div class="col-md-8 col-lg-9">
        <div class="form-floating">

            <textarea id="floatingTextarea2" name="{{ $name }}"
                {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }} style="height: 100px">
                {{ old($name, $value) }}
            </textarea>


            @error($name)
                <b class="invalid-feedback">
                    {{ $message }}
                </b>
            @enderror
        </div>
    </div>
</div>
