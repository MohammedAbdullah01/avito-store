<button type="button" class="btn btn-outline-info btn-sm m-1" data-bs-toggle="modal"
    data-bs-target="#show_product{{ $item->id }}"><i class="bi bi-eye-fill"></i></button>

<div class="modal fade" id="show_product{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content card shadow-lg p-3  bg-body rounded ">
            <div class="modal-header">
                <h5 class="card-title " id="staticBackdropLabel">{{ $item->title }}</h5>
                <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card  shadow-lg p-3  bg-body rounded" style="width=100%">
                    <img src=" {{ $item->mainPictureProduct }} " height="250px" class="card-img-top" alt="...">
                    <div class="card-body"><br>
                        <div class="d-flex">
                            <div class="container">
                                <div class="row align-items-start">
                                    @forelse ($item->images as $image)
                                        <div class="col">
                                            <img class="img-thumbnail"
                                                src="{{ asset('storage/products/sub_images/' . $image->sub_images) }}"
                                                height="70px" width="70px">
                                        </div>
                                    @empty
                                        <div class="alert alert-danger text-center">
                                            {{ __('There Are No Sub Images ') }} <i class="bi bi-emoji-frown-fill"></i>
                                        </div>
                                    @endforelse


                                </div>
                            </div>
                        </div>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $item->description }}</li>
                            <li class="list-group-item">{{ __('Price:') }}
                                <span class="float-end">
                                    @if ($item->sale_price)
                                        <x-currancy :amount="$item->sale_price" />
                                        <del>
                                            <x-currancy :amount="$item->price" />
                                        </del>
                                    @else
                                        <x-currancy :amount="$item->price" />

                                        <del></del>
                                        /
                                        <x-currancy :amount="$item->sale_price" />

                                        </del>
                                    @endif

                                </span>
                            </li>
                            <li class="list-group-item">{{ __('Quantity:') }}
                                <span class="float-end">{{ $item->quantity }}</span>
                            </li>
                            <li class="list-group-item">{{ __('Categorie:') }}
                                <span class="float-end">{{ $item->categorie->c_name }}</span>
                            </li>
                            <li class="list-group-item">{{ __('Color:') }}
                                @foreach ($item->theColors as $coool)
                                    <span class="badge bg-dark float-end m-1">{{ $coool }}</span>
                                @endforeach

                            </li>

                            <li class="list-group-item">{{ __('Size:') }}
                                @foreach ($item->theSizes as $sizzz)
                                    <span class="badge bg-dark float-end m-1">{{ $sizzz }}</span>
                                @endforeach

                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
