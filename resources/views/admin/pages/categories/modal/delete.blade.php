<button type="button" class="btn btn-outline-danger btn-sm m-1" data-bs-toggle="modal"
    data-bs-target="#delete{{ $cate->id }}">
    <i class="bi bi-trash-fill"></i>
</button>

<div class="modal fade" id="delete{{ $cate->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card text-primary mb-3">
            <div class="modal-header">
                <h5 class="modal-title">{{ $cate->name }}</h5>
                <button type="button" class="btn-close btn-dark btn-sm" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form action=" {{ route('admin.category.delete', $cate->id) }} " method="post">
                @csrf
                @method('DELETE')
                <div class="mb-3">
                    <div class="text-center " style="margin-top: 10px">
                        <img class="img-thumbnail" src="{{  $cate->AvatarCategory }}"
                            alt="{{ $cate->avatar }}">
                    </div>
                </div>
                <div class="modal-body text-danger text-center">
                    {{ __('Are You Sure You Want To Delete  [ ' . $cate->name . ' ]  Categorie') }}
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
