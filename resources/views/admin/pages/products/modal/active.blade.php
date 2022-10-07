    <!-- Button trigger modal -->
    <button class="btn btn-outline-warning btn-sm " type="button" data-bs-target="#product_active{{ $product->id }}"
        data-bs-toggle="modal">
        <i class="bi bi-check2-circle"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="product_active{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg p-3 mb-2 bg-body rounded">
                <div class="modal-header">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <button type="button" class="btn-close btn-sm btn btn-dark" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action=" {{ route('admin.product.activate', $product->id) }} " method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <div class="text-center" style="margin-top:8px">
                                <img src="{{ $product->mainPictureProduct }}" class="img-thumbnail"
                                    style="height: 100px">
                            </div>
                            <div class="modal-body text-warning fw-bold text-center">
                                {{ __('Are You Sure You Want To activate [ ' . $product->title . ' ] Product') }}
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark btn-sm"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-outline-warning btn-sm">{{ __('Activate') }}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>