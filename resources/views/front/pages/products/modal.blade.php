<div class="modal fade" id="ExtralargeModal{{ $product->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="card-title">{{ $product->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ $product->main_picture }}" height="300px" alt="...">
                        </div>
                        <div class="col-md-6 ">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">${{ $product->price }}</p>
                                <p class="card-text"><small
                                        class="text-muted">{{ $product->created_at->diffForhumans() }}</small></p><br>
                                <p class="card-text">Quantity
                                <form action=" {{ route('cart.store') }} " method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="quantity" value="1">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 d-flex">
                            <img src="{{ $product->sub_images }}" width="100px" height="100px"
                                style="border-radius: 20%;margin: 5px" alt="...">
                            <img src="{{ $product->sub_images }}" width="100px" height="100px"
                                style="border-radius: 20%" alt="...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
            </div>
            </form>
        </div>
    </div>
</div>
