    <!-- Button trigger modal -->
    <button class="btn btn-outline-danger btn-sm " type="button" data-bs-target="#product_delete{{ $item->id }}"
        data-bs-toggle="modal">
        <i class="bi bi-trash-fill"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="product_delete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card shadow-lg p-3 mb-5 bg-body rounded ">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <strong>
                            {{ $item->title }}
                        </strong>
                    </h5>
                    <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action=" {{ route('user.favorite.delete', $item->favourite->id) }} " method="post">
                        @csrf
                        @method('DELETE')

                        <div class="mb-3">
                            <div class="text-center" style="margin-top:8px">
                                <img class="img-thumbnail" src="{{ $item->mainPictureProduct }}"
                                    alt="{{ $item->main_picture }}" width="70px" height="70px">
                            </div>
                            <div class="modal-body text-danger text-center">
                                {{ __('Are You Sure You Want To Delete To Remove It From Your Wishlist [ ' . $item->title . ' ]   Product ') }}
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-outline-danger btn-sm">{{ __('Delete') }}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
