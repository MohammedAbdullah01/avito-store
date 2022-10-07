<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
    data-bs-target="#delete_user{{ $user->id }}">

    <i class="bi bi-trash-fill"></i>
</button>

<div class="modal fade" id="delete_user{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card text-white bg-dark mb-3">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $user->name }}</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action=" {{ route('admin.user.delete', $user->id) }} " method="post">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <div class="text-center" style="margin-top:8px">
                            <img class="img-thumbnail" src="{{ $user->ImagUser }}" alt="{{ $user->ImagUser }}"
                                width="100px" height="100px">
                        </div>

                        <div class="modal-body text-danger text-center">
                            <b>

                                {{ __('Are You Sure You Want To Delete ' . $user->name . ' User ?') }}
                            </b>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                            {{ __('Close') }}
                        </button>
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            {{ __('Delete') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
