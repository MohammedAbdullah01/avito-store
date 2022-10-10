@extends('front.layouts.inc.header')
@section('title', 'Single Product')
@section('content')

    @include('front.layouts.inc.nav')

    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('Home') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products.all') }}">
                                {{ __('Shop') }}
                            </a>
                        </li>

                        <li class="active">
                            {{ __('Single Product') }}
                        </li>
                    </ol>
                </div>

                <div class="col-md-6">
                    <ol class="product-pagination text-end">
                        <li>
                            <a href="blog-left-sidebar.html">
                                <i class="tf-ion-ios-arrow-left"></i>
                                {{ __('Next') }}
                            </a>
                        </li>

                        <li>
                            <a href="blog-left-sidebar.html">
                                <i class="tf-ion-ios-arrow-right"></i>
                                {{ __('Preview') }}
                            </a>
                        </li>

                    </ol>
                </div>

            </div>
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                            <div class='carousel-outer'>
                                <!-- me art lab slider -->
                                <div class='carousel-inner '>
                                    <div class='item active'>
                                        <img src='{{ $product->MainPictureProduct }}' alt=''
                                            data-zoom-image="{{ $product->MainPictureProduct }}" />
                                    </div>
                                    @foreach ($product->images as $image)
                                        <div class='item'>
                                            <img src='{{ $image->SubPictureProduct }}' alt=''
                                                data-zoom-image="{{ $image->SubPictureProduct }}" />
                                        </div>
                                    @endforeach
                                </div>

                                <!-- sag sol -->
                                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                    <i class="tf-ion-ios-arrow-left"></i>
                                </a>
                                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                    <i class="tf-ion-ios-arrow-right"></i>
                                </a>
                            </div>

                            <!-- thumb -->
                            @php
                                $i = 1;
                            @endphp
                            <ol class='carousel-indicators mCustomScrollbar meartlab' style="text-align: center">

                                <li data-target='#carousel-custom' data-slide-to='0'>
                                    <img src='{{ $product->MainPictureProduct }}' alt='' />
                                </li>
                                @forelse ($product->images as $image)
                                    <li data-target='#carousel-custom' data-slide-to='{{ $i++ }}'>
                                        <img src='{{ $image->SubPictureProduct }}' alt='' />
                                    </li>
                                @empty
                                    <div class="text-danger title text-center ">
                                        <h2>{{ __('There Are No Sub Pictures') }}</h2>
                                        <i class="bi bi-emoji-frown-fill"></i>
                                    </div>
                                @endforelse
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2>{{ $product->title }}</h2>
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

                        <p class="product-description mt-20">
                            {{ $product->description }}
                        </p>

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
                                    <input type="hidden" name="supplier_id" value="{{ $product->supplier_id }}">
                                    <input id="product-quantity" type="text" value="1" name="product-quantity">
                                </div>
                            </div>
                            <div class="product-category">
                                <span>Categories:</span>
                                <ul>
                                    <li>
                                        <a href="{{ route('show.products.in.category', $product->category->slug ?? '') }}">
                                            {{ $product->category->name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @if (Auth::guard('web')->check())
                                <button type="submit" class="btn btn-main mt-20">Add To Cart</button>
                            @else
                                <div class="mt-20">
                                    <a href="" class="btn btn-primary">Log In</a>
                                    <span>Or</span>
                                    <a href="" class="btn btn-primary">Sig Up</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">

                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#details" aria-expanded="true">Details</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#reviews" aria-expanded="false">
                                    {{ __('Reviews') . '( ' . $comments->count() ?? '' }} {{ ' )' }}
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h4>Product Description</h4>
                                <p>{{ $product->description }}</p>
                            </div>

                            <!-- reviews Comments -->
                            <div id="reviews" class="tab-pane fade">
                                <div class="post-comments">
                                    <ul class="media-list comments-list m-bot-50 clearlist">
                                        @forelse ($comments as $comment)
                                            <li class="media">

                                                <a class="pull-left" href="#!">
                                                    <img class="media-object comment-avatar"
                                                        src="{{ $comment->user->ImagUser }}" alt=""
                                                        width="50" height="50" />
                                                </a>

                                                <div class="media-body">
                                                    <div class="comment-info">
                                                        <h4 class="comment-author">
                                                            <a href="#!">{{ $comment->user->name }}</a>

                                                        </h4>
                                                        <time
                                                            datetime="2013-04-06T13:53">{{ $comment->created_at->diffForHumans() }}</time>
                                                        <a class="comment-button" href="#!"><i
                                                                class="tf-ion-chatbubbles"></i>Reply</a>
                                                    </div>

                                                    <p>
                                                        {{ $comment->body }}
                                                    </p>
                                                </div>

                                            </li>
                                            <!-- End Comment Item -->
                                        @empty
                                            <div class="text-danger title text-center ">
                                                <h2>{{ __('There Are No Comments') }}</h2>

                                                <i class="bi bi-emoji-frown-fill"></i>
                                            </div>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products related-products section">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
            @include('front.layouts.inc.__products')
            {{-- <div class="row">
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <span class="bage">Sale</span>
                            <img class="img-responsive" src="images/shop/products/product-5.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Reef Boardsport</a></h4>
                            <p class="price">$200</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-1.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                            <p class="price">$200</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-2.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Strayhorn SP</a></h4>
                            <p class="price">$230</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-3.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Bradley Mid</a></h4>
                            <p class="price">$200</p>
                        </div>
                    </div>
                </div>

            </div> --}}
        </div>
    </section>

















    {{-- <main id="main" class="container mt-2 bg-white">

        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="bi bi-house-door"></i><a href="{{ route('home') }}">Home</a></li>
                    @if ($product->category->name)
                        <li class="breadcrumb-item">
                            <a
                                href="{{ route('show.products.in.category', $product->category->name) }}">{{ $product->category->name }}</a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active">{{ $product->title }}</li>
                </ol>
            </nav>
            <a class="nav-link" href="{{ route('supplier.profile.view', $product->supplier->slug) }}">
                <img src="{{ $product->supplier->ImgSupplier }}" height="40" alt="Profile" class="rounded-circle">
                {{ $product->supplier->name }}
            </a>
        </div>
    </main>

    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-20 p-b-60 ">
        <div class="container">
            <div class="row">

                <!-- product MainPicture &&  SubImages -->
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="{{ $product->mainPictureProduct }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ $product->mainPictureProduct }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="{{ $product->mainPictureProduct }}">
                                            <i class="bi bi-arrows-angle-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                @forelse ($product->images as $item)
                                    <div class="item-slick3" data-thumb="{{ $item->subPictureProduct }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ $item->subPictureProduct }}" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{ $item->subPictureProduct }}">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                @endforelse


                            </div>
                        </div>
                    </div>
                </div>

                <!-- View Data The Product && Form Add To Cart && Form Product Wishlist -->
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->title }}
                            @if ($ratings)
                                @if ($ratings > 9)
                                    <i class="bi bi-check-circle-fill text-primary"></i>
                                @else
                                    <span class="float-end">
                                        <span>{{ $ratings / $product->ratings()->count() }}</span> <i
                                            class="bi bi-star-fill text-warning"></i>
                                @endif
                            @endif
                            </span>
                        </h4>

                        <span class="mtext-106 cl">
                            @if ($product->sale_price)
                                <del>
                                    <x-currancy :amount="$product->price" />
                                </del> /
                                <x-currancy :amount="$product->sale_price" />
                            @else
                                <x-currancy :amount="$product->price" />
                            @endif
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{ Str::limit($product->description, 40, '...') }}
                        </p>

                        <!-- Form Add To Cart -->

                        <div class="p-t-33">
                            <div class="flex-w justify-content-start p-b-10">
                                <form action=" {{ route('user.cart.store') }} " method="post">
                                    @csrf
                                    @method('POST')

                                    <div class="flex-w flex-r-m p-b-20">
                                        <div class="size-203 flex-c-m respon6">
                                            {{ __('Size') }}
                                        </div>

                                        <div class="rs1-select2 bor8 bg0" style="width: 200px">
                                            <select class="form-select form-select-sm" name="size">
                                                <option value="">{{ __('Choose an option') }}</option>
                                                @foreach ($product->theSizes as $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                            @error('size')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-20">
                                        <div class="size-203 flex-c-m respon6">
                                            {{ __('Color') }}
                                        </div>

                                        <div class="rs1-select2 bor8 bg0" style="width: 200px">
                                            <select class="form-select form-select-sm" name="color">
                                                <option value="">{{ __('Choose an option') }}</option>
                                                @foreach ($product->theColors as $color)
                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                @endforeach
                                            </select>
                                            @error('color')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    @if (Auth::guard('web')->check())
                                        <div class="flex-w justify-content-end p-b-20 p-t-40">
                                            <div class="flex-w flex-m" style="margin-left: 60px">
                                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="bi bi-dash"></i>
                                                    </div>

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="supplier_id"
                                                        value="{{ $product->supplier_id }}">
                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        name="quantity" value="1">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="bi bi-plus"></i>
                                                    </div>
                                                </div>

                                                <button
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                                    type="submit">
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>

                        <!-- Form Wishlist -->

                        <div class="flex-w flex-m p-l-150 p-t-40 respon7">
                            <form action="{{ route('user.favorite.products') }}" method="post">
                                @csrf
                                @method('POST')

                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                        data-tooltip="Add to Wishlist">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <x-favourite :productid="$product->id" />
                                    </a>
                            </form>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Facebook">
                            <i class="bi bi-facebook text-primary fs-17"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Twitter">
                            <i class="bi bi-twitter text-info fs-17"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Instagram">
                            <i class="bi bi-instagram text-danger fs-17"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Tab-content -->
        <div class="bor10 m-t-50 p-t-43 p-b-40">

            <!-- Nav tab -->
            <nav>
                <div class="nav  gap-2 col-6 mx-auto justify-content-around" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#description"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#information"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Additional
                        Information</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews (
                        {{ $product->comments_count }} )</button>
                </div>
            </nav>

            <!-- Start Tab -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-content p-t-43">

                    <!-- Tab Description Product -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="nav-home-tab" tabindex="0">

                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {{ $product->description }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Details Product -->
                    <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="nav-contact-tab"
                        tabindex="0">

                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Weight
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            0.79 kg
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Dimensions
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            110 x 33 x 100 cm
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Materials
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            60% cotton
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Color
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ implode(' , ', $product->theColors) }}
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Size
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            {{ implode(' , ', $product->theSizes) }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- Tab views Comments && Form Store Rating && Form Store Comment -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="nav-disabled-tab"
                        tabindex="0">

                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-8 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">

                                    <!-- Reviews Comments -->
                                    @forelse ($product->comments as $comment)
                                        <div class="flex-w flex-t p-b-68">
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="{{ $comment->user->ImagUser }}" alt="AVATAR">
                                            </div>

                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        {{ $comment->user->name }}
                                                    </span>

                                                </div>

                                                <p class="stext-102 cl6">
                                                    {{ $comment->body }}
                                                    <span
                                                        class="float-end">{{ $comment->created_at->diffForHumans() }}</span>
                                                </p>
                                            </div>
                                        </div>

                                    @empty
                                        <div class="alert alert-danger text-center w-75 m-auto mb-5">
                                            {{ __('There Are No Comments ') }} <i class="bi bi-emoji-frown-fill"></i>
                                        </div>
                                    @endforelse

                                    <div class="float-end">

                                        {{ $product->comments()->links() }}

                                    </div>
                                </div>


                                @guest
                                    @if (!Auth::guard('supplier')->check())
                                        <p class="stext-102 cl6 text-center">
                                            {{ __('To Add a Comment On The Product, Please ') }}
                                            <a href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                            <span>{{ 'OR' }}</span>
                                            <a href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                        </p>
                                    @endif
                                @endguest

                                @if (Auth::guard('web')->check())
                                    <!-- Add review -->
                                    <form class="w-full" action="{{ route('user.rating.store') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            {{ __('Add a Review') }}
                                        </h5>

                                        <p class="stext-102 cl6">
                                            {{ __('Your Email Address Will Not Be Published. Required Fields Are Marked *') }}
                                        </p>

                                        <div class="flex-w flex-m  p-b-23">
                                            <span class="stext-102 cl3 m-r-16">
                                                {{ __('Your Rating') }}
                                            </span>

                                            <div class="rating-css">
                                                <div class="star-icon">

                                                    <x-rating :productid="$product->id" />

                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                    <form action="{{ route('user.comment.store') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">

                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 border border-secondary stext-102 cl2 p-lr-20 p-tb-10" name="comment"></textarea>
                                                @error('comment')
                                                    <b class="text-danger">{{ $message }}</b>
                                                @enderror
                                            </div>
                                        </div>

                                        <button
                                            class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10"
                                            type="submit">
                                            Submit
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
                {{ __('SKU') }}: JAK-01
            </span>

            <span class="stext-107 cl6 p-lr-25">
                {{ __('Category') }}: {{ $product->category->name }}
            </span>
        </div>

    </section> --}}

@endsection
