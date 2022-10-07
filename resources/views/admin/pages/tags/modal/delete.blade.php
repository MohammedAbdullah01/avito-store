<button type="button" class="btn btn-outline-danger btn-sm m-1" data-bs-toggle="modal"
    data-bs-target="#delete{{ $tag->id }}">
    <i class="bi bi-trash-fill"></i>
</button>

<div class="modal fade" id="delete{{ $tag->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card text-primary mb-3">
            <div class="modal-header">
                <h5 class="modal-title">{{ $tag->slug }}</h5>
                <button type="button" class="btn-close btn-dark btn-sm" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form action=" {{ route('admin.tag.delete', $tag->id) }} " method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body text-danger text-center">
                    {{ __('Are You Sure You Want To Delete  [ ' . $tag->name . ' ]  Tag') }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark  btn-sm"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-outline-danger btn-sm ">{{ __('Delete') }}</button>
                </div>

            </form>

        </div>
    </div>
</div>
