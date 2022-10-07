{{-- This Is Modal Create Categories && Form Store --}}
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-outline-primary btn-sm mb-2  " type="button" data-bs-toggle="modal"
        data-bs-target="#create_category">
        {{ __('Create Tag') }}
    </button>
</div>

<div class="modal fade" id="create_category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" class="modal fade" id="create_category" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content card text-primary mb-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('New Tag') }}
                </h5>
                <button type="button" class="btn-close btn btn-dark" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('admin.tag.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">
                            {{ __('Name') }}
                        </label>

                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            placeholder="Type The Name of The Department">

                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark btn-sm"
                            data-bs-dismiss="modal">{{ __('Close') }}
                        </button>

                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            {{ __('Create') }}
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
