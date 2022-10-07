<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-info btn-sm m-1" data-bs-toggle="modal"
    data-bs-target="#show_product{{ $product->id }}">
    <i class="bi bi-eye-fill"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="show_product{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('Product Details') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $product->mainPictureProduct }}" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <p class="card-text text-end">
                                    <small class="text-muted">
                                        {{ $product->created_at->diffForHumans() }}
                                    </small>
                                </p>

                                <h5 class="card-title">
                                    {{ $product->title }}
                                </h5>

                                <!-- Product Details -->
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item">
                                        <p class="card-text">
                                            {{ $product->description }}
                                        </p>
                                    </li>

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

                                    <li class="list-group-item">{{ __('Quantity:') }}
                                        <span class="float-end">{{ $product->quantity }}</span>
                                    </li>

                                    <li class="list-group-item">{{ __('Categorie:') }}
                                        <span class="float-end">{{ $product->category->name }}</span>
                                    </li>

                                    <li class="list-group-item">{{ __('Color:') }}
                                        @foreach ($product->theColors as $coool)
                                            <span class="badge bg-dark float-end m-1">{{ $coool }}</span>
                                        @endforeach
                                    </li>

                                    <li class="list-group-item">{{ __('Size:') }}
                                        @foreach ($product->theSizes as $sizzz)
                                            <span class="badge bg-dark float-end m-1">{{ $sizzz }}</span>
                                        @endforeach

                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sub Photos -->
                <div class="row align-items-start">
                    @forelse ($product->images as $image)
                        <div class="col-lg-2 m-auto">
                            <img src="{{ $image->subPictureProduct }}" class="img-thumbnail" style="height: 100px; width: 100px;">
                        </div>
                    @empty
                        <div class="alert alert-danger text-center">
                            {{ __('There Are No Sub Images !') }}
                        </div>
                    @endforelse
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-dark" data-bs-dismiss="modal">
                    {{ __('Close') }}
                </button>
            </div>
        </div>
    </div>
</div>
