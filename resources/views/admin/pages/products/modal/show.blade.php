<button type="button" class="btn btn-outline-info btn-sm " data-bs-toggle="modal"
    data-bs-target="#show_product{{ $product->id }}"><i class="bi bi-eye-fill"></i></button>

<div class="modal fade" id="show_product{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content card shadow-lg p-3  bg-body rounded">
            <div class="modal-header">
                <h5 class="card-title " id="staticBackdropLabel">{{ $product->title }}</h5>
                <button type="button" class="btn-close btn btn-dark btn-sm" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card shadow-lg p-3 mb-2 bg-body rounded" style="width=100%">
                    <img src=" {{ $product->mainPictureProduct }} " class="img-thumbnail" style="height: 300px">
                    <div class="card-body"><br>
                        <div class="d-flex">
                            <div class="container">
                                <div class="row align-items-start">
                                    @forelse ($product->images as $image)
                                        <div class="col">
                                            <img src="{{ $image->subPictureProduct }}" class="img-thumbnail"
                                                style="height: 100px">
                                        </div>
                                    @empty
                                        <div class="alert alert-danger text-center">
                                            {{ __('There Are No Sub Images !') }}
                                        </div>
                                    @endforelse


                                </div>
                            </div>
                        </div>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $product->description }}</li>
                            <li class="list-group-item">{{ __('Price:') }}
                                <span class="float-end">
                                    @if ($product->sale_price)
                                        <x-currancy :amount="$product->sale_price" />
                                        <del>
                                            <x-currancy :amount="$product->price" />
                                        </del>
                                    @else
                                        <x-currancy :amount="$product->price" />
                                    @endif

                                </span>
                            </li>

                            <li class="list-group-item">{{ __('Color:') }}
                                @foreach ($product->theColors as $coool)
                                    <span class="badge bg-dark float-end ">{{ $coool }}</span>
                                @endforeach
                            </li>

                            <li class="list-group-item">{{ __('Size:') }}
                                @foreach ($product->theSizes as $sizzz)
                                    <span class="badge bg-dark float-end ">{{ $sizzz }}</span>
                                @endforeach
                            </li>

                            <li class="list-group-item">{{ __('Quantity:') }}
                                <span class="float-end">{{ $product->quantity }}</span>
                            </li>

                            <li class="list-group-item">{{ __('Category:') }}
                                <span class="float-end">{{ $product->category->name }}</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-dark"
                    data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
