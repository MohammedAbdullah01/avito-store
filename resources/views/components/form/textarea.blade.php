@props(['name', 'value' => '', 'lable' => '', 'placeholder' => ''])


<div class="form-group">

            <textarea name="{{ $name }}"
                {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }} style="height: 100px">
                {{ old($name, $value) }}
            </textarea>


            @error($name)
                <b class="invalid-feedback">
                    {{ $message }}
                </b>
            @enderror
</div>
