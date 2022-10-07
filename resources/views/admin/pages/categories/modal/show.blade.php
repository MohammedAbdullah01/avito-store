<button type="button" class="btn btn-outline-info btn-sm m-1" data-bs-toggle="modal"
    data-bs-target="#show{{ $cate->id }}">
    <i class="bi bi-eye-fill"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="show{{ $cate->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card mb-3">

            <div class="modal-header">
                <h5 class="modal-title text-primary">{{ $cate->name }}</h5>
                <button type="button" class="btn-close btn-dark btn-sm" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <img class="card-img-top" height="400" src="{{ $cate->AvatarCategory }}" alt="{{ $cate->avatar }}">

                    </div>
                    <div class="card-body">

                        <p class="card-text">
                            <label for="exampleInputFile" class="col-form-label">{{ $cate->description }}</label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark btn-sm"
                    data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
