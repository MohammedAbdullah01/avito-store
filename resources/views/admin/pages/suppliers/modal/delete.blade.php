<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
    data-bs-target="#delete_supplier{{ $supplier->id }}">

    <i class="bi bi-trash-fill"></i>
</button>

<div class="modal fade" id="delete_supplier{{ $supplier->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card text-white bg-dark mb-3">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $supplier->name }}</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action=" {{ route('admin.supplier.delete', $supplier->id) }} " method="post">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <div class="text-center" style="margin-top:8px">
                            <img class="img-thumbnail" src="{{ $supplier->ImgSupplier }}" alt="{{ $supplier->avatar }}"
                                width="100px" height="100px">
                        </div>
                        <div class="modal-body text-danger text-center">
                            <strong>
                                {{ __('Are You Sure You Want To Delete Supplier ?') }}
                            </strong>
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
