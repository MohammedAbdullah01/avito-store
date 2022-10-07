    <!-- Button trigger modal -->
    <button class="btn btn-outline-danger btn-sm " type="button" data-bs-target="#product_delete{{ $product->id }}"
        data-bs-toggle="modal">
        <i class="bi bi-trash-fill"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="product_delete{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog modal-lg">
            <div class="modal-content shadow-lg bg-body rounded">
                <div class="modal-header">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <button type="button" class="btn-close btn-sm btn btn-dark" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action=" {{ route('supplier.delete', $product->id) }} " method="post">
                        @csrf
                        @method('DELETE')

                        <div class="mb-3">
                            <div class="text-center" style="margin-top:8px">
                                <img src="{{ $product->mainPictureProduct }}" class="img-thumbnail"
                                    style="height: 100px">
                            </div>
                            <div class="modal-body text-danger text-center">
                                {{ __('Are You Sure You Want To Delete [ ' . $product->title . ' ] Product') }}
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark btn-sm"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-outline-danger btn-sm">{{ __('Delete') }}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
