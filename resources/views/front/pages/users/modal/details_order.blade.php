<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
    data-bs-target="#details_order{{ $order->id }}">
    <i class="bi bi-eye-fill"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="details_order{{ $order->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">#{{ $order->number }}</h5>
                <button type="button" class="btn-close btn btn-outline-dark btn-sm" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    @forelse ($order->items as $product)
                        <div class="col-md-4 ">
                            <div class="card shadow-lg p-3 mb-5 bg-body rounded recent-sales" style="width: 22rem;">
                                <img src="{{ asset('storage/products/' . $product->image) }}" class="img-thumbnail"
                                    alt="...">
                                <div class="card-body">
                                    <a href=" {{ route('show.product', Str::slug($product->product_name)) }} ">
                                        <h5 class="card-title ">{{ $product->product_name }}</h5>
                                    </a>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">
                                        {{ __('Price') }}
                                        <span class="float-end badge bg-info text-dark">
                                            <x-currancy :amount="$product->price" />
                                        </span>
                                    </li>

                                    <li class="list-group-item">
                                        {{ __('Color') }}
                                        <span class="float-end badge bg-info text-dark">
                                            {{ $product->color }}
                                        </span>
                                    </li>

                                    <li class="list-group-item">Size
                                        <span class="float-end badge bg-info text-dark">
                                            {{ $product->size }}
                                        </span>
                                    </li>

                                    <li class="list-group-item">
                                        {{ __('Quantity') }}
                                        <span class="float-end badge bg-info text-dark">
                                            {{ $product->quantity }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark btn-sm"
                    data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
