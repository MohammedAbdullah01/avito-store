<button type="button" class="btn btn-outline-success btn-sm m-1" data-bs-toggle="modal"
    data-bs-target="#edit{{ $tag->id }}">
    <i class="bi bi-pencil-square"></i>
</button>

<div class="modal fade" id="edit{{ $tag->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card text-primary mb-3">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Tag') }}</h5>
                <button type="button" class="btn-close btn-dark btn-sm" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body" style="padding: 0px">

                    <form action=" {{ route('admin.tag.update', $tag->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ $tag->name, old('name') }}">
                            @error('name')
                                <strong class="text-danger">
                                    {{ $message }}
                                </strong>
                            @enderror
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">
                                {{ __('Close') }}
                            </button>
                            <button type="submit" class="btn btn-outline-success btn-sm">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
