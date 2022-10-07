{{-- This Is Modal Delete Suppliere --}}
<button type="button" class="btn btn-outline-warning btn-sm d-grid gap-2 col-12 mx-auto" data-bs-toggle="modal"
    data-bs-target="#active_supplier{{ $supplier->id }}">
    {{ __('Activate') }}
</button>

<!-- Modal -->
<div class="modal fade" id="active_supplier{{ $supplier->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card text-white bg-dark mb-3">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> {{ $supplier->name }} </h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action=" {{ route('admin.supplier.activ', $supplier->id) }} " method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <div class="text-center" style="margin-top:8px">
                        <img class="img-thumbnail" src="{{ $supplier->ImgSupplier }}" alt="{{ $supplier->avatar }}"
                            width="100px" height="100px">
                    </div>
                    <div class="modal-body text-warning text-center">
                        {{ 'Are You Sure You Want To Activate ' . $supplier->name . ' Supplier ?' }}
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    <button type="submit" class="btn btn-outline-warning btn-sm">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
