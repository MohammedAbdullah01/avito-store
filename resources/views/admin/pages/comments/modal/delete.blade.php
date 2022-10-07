    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger btn-sm d-grid gap-2 col-12 mx-auto" data-bs-toggle="modal"
        data-bs-target="#delete_comment{{ $comment->id }}">
        <i class="bi bi-trash-fill"></i>
    </button>


    <!-- Modal -->
    <div class="modal fade" id="delete_comment{{ $comment->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card text-primary mb-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        {{ 'The Comment [ ' . $comment->user->name . ' ]' }}</h5>
                    <button type="button" class="btn-close btn-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action=" {{ route('admin.comment.delete', $comment->id) }} " method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <strong class="text-danger">
                            {{ 'Are You Sure You Want To Delete Comment  [ ' . $comment->body . ' ] ' }}
                        </strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">
                            {{ __('Close') }}
                        </button>
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            {{ 'Delete' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
