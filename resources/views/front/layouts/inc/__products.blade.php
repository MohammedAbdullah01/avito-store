<div class="row">

    @forelse ($products as $product)
        <div class="col-md-4">
            <div class="product-item">
                <div class="product-thumb">
                    {!! $product->saleProduct !!}
                    {!! $product->ActivateProduct !!}
                    <img class="img-responsive " src="{{ $product->mainPictureProduct }}" alt="product-img"
                        style="height: 300px" />
                    <div class="preview-meta">
                        <ul>
                            <li>
                                <span data-toggle="modal" data-target="#product-modal{{ $product->id }}">
                                    <i class="tf-ion-ios-search-strong"></i>
                                </span>
                            </li>
                            <li>
                                @if (!Auth::guard('supplier')->check())
                                    <form action="{{ route('user.favorite.products') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <a>
                                            {{-- <i class="tf-ion-ios-heart"></i> --}}
                                            <x-favourite :productid="$product->id" />
                                        </a>
                                    </form>
                                @endif
                            </li>

                            <li>
                                <span data-toggle="modal" data-target="#product-modal-edit{{ $product->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </span>
                            </li>

                            <li>
                                <span data-toggle="modal" data-target="#product-modal-delete{{ $product->id }}">
                                    <i class="bi bi-trash-fill"></i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="product-content">
                    <h4>
                        <a href="{{ route('show.product', $product->slug) }}">
                            {{ $product->title }}
                        </a>
                    </h4>
                    <p class="price">
                        @if ($product->sale_price)
                            <del>
                                <x-currancy :amount="$product->price" />
                            </del> /
                            <x-currancy :amount="$product->sale_price" />
                        @else
                            <x-currancy :amount="$product->price" />
                        @endif
                    </p>

                </div>
            </div>
        </div>

        @if ($product->supplier_id == Auth::guard('supplier')->id())
            @include('front.pages.suppliers.modal.delete')
            @include('front.pages.suppliers.modal.edit')
        @endif


        <!-- Modal -->
        <div class="modal product-modal fade" id="product-modal{{ $product->id }}">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tf-ion-close"></i>
            </button>
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <div class="modal-image">
                                    <img class="img-responsive" src="{{ $product->mainPictureProduct ?? '' }}"
                                        alt="product-img" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-short-details">
                                    <h2 class="product-title">{{ $product->title ?? '' }}</h2>
                                    <p class="product-price">
                                        @if ($product->sale_price)
                                            <del>
                                                <x-currancy :amount="$product->price" />
                                            </del>
                                            <x-currancy :amount="$product->sale_price" />
                                        @else
                                            <x-currancy :amount="$product->price" />
                                        @endif
                                    </p>
                                    <p class="product-short-description">
                                        {{ $product->description }}
                                    </p>
                                    <div class="single-product-details">
                                        <form action=" {{ route('user.cart.store') }} " method="post">
                                            @csrf
                                            @method('POST')

                                        <div class="product-size">
                                            <span>Color:</span>
                                            <select class="form-control" name="color">
                                                @foreach ($product->theColors as $color)
                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="product-size">
                                            <span>Size:</span>
                                            <select class="form-control" name="size">
                                                @foreach ($product->theSizes as $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="product-quantity">
                                            <span>Quantity:</span>
                                            <div class="product-quantity-slider">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="supplier_id"
                                                    value="{{ $product->supplier_id }}">
                                                <input class="form-group" id="product-quantity" type="text"
                                                    value="1" name="product-quantity">
                                            </div>
                                        </div>
                                    </div>
                                    @if (Auth::guard('web')->check())
                                        <a href="cart.html" class="btn btn-main">Add To Cart</a>
                                    @endif
                                    <a href="{{ route('show.product', $product->slug) }}" class="btn btn-transparent">
                                        {{ __('View Product Details') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->


    @empty
        <div class="text-danger title text-center ">
            <h2>{{ __('There Are No Products') }}</h2>

            <i class="bi bi-emoji-frown-fill"></i>
        </div>
    @endforelse
</div>













{{-- <section class="bg0 p-t-23 ">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                {{ __('Products Overview') }}
            </h3>
        </div>



        <div class="row isotope-grid">
            @forelse ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 p-t-35 isotope-item ">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0 {{ $product->saleProduct }}" data-label="Sale">
                            <img src="{{ $product->mainPictureProduct }}" class="img-thumbnail" style="height: 400px"
                                alt="IMG-PRODUCT">

                            <a href=" {{ route('show.product', $product->slug) }} "
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                {{ __('Quick View') }}
                            </a>

                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ route('show.product', $product->slug) }}"
                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product->title }}
                                </a>

                                <span class="stext-105 cl3">
                                    @if ($product->sale_price)
                                        <del>
                                            <x-currancy :amount="$product->price" />
                                        </del> /
                                        <x-currancy :amount="$product->sale_price" />
                                    @else
                                        <x-currancy :amount="$product->price" />
                                    @endif
                                </span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                                @if (!Auth::guard('supplier')->check())
                                    <form action="{{ route('user.favorite.products') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <a class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <x-favourite :productid="$product->id" />
                                        </a>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container ">

                    <div class="alert alert-danger w-50 text-center m-auto ">
                        {{ __('There Are No Products') }} <i class="bi bi-emoji-frown-fill"></i>
                    </div>

                </div>
            @endforelse
        </div>


    </div>
</section> --}}
