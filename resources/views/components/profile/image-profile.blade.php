<div class="row mb-3">
    <label for="profileImage"
        class="col-md-4 col-lg-3 col-form-label">{{ __($lable) }}</label>
    <div class="col-md-8 col-lg-9">
        <img class="img-thumbnail" src="{{ $value }}" style="max-width: 104px">
        <div class="pt-2">
            <a href="#" class="btn btn-outline-light btn-sm">
                <input type="file" name="{{$name}}">
            </a>
        </div>
    </div>
</div>
