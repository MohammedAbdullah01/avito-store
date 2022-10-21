@extends('front.layouts.inc.header')
@section('title', 'Home')
@section('content')

    @include('front.layouts.inc.nav')
    <div class="container">
        <x-alert />
    </div>
    @include('front.layouts.inc.__hero-slider')

    <!-- Latest Categories -->
    <section class="product-category section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>Product Category</h2>
                    </div>
                </div>
                @forelse ($categories as $categorie)
                    <div class="col-md-4">
                        <h3>{{ $categorie->name }}</h3>
                        <p>{{ $categorie->description }}</p>
                        <div class="category-box">
                            <a href="{{ route('show.products.in.category', $categorie->slug) }}">
                                <img src="{{ $categorie->AvatarCategory }}" alt="" />
                                <div class="content">
                                    <h3>{{ $categorie->name }}</h3>
                                    <p>{{ $categorie->description }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-danger title text-center ">
                        <h2>{{ 'There Are No Categories' }}</h2>

                        <i class="bi bi-emoji-frown-fill"></i>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Latest products -->
    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Trendy Products</h2>
                </div>
            </div>
            @include('front.layouts.inc.__products')
        </div>
    </section>


    <!--Start Call To Action -->
    <section class="call-to-action bg-gray section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="title">
                        <h2>SUBSCRIBE TO NEWSLETTER</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut
                            sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                    </div>
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="input-group subscription-form">
                            <input type="text" class="form-control" placeholder="Enter Your Email Address">
                            <span class="input-group-btn">
                                <button class="btn btn-main" type="button">Subscribe Now!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->

                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <section class="section instagram-feed">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>View us on instagram</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="instagram-slider" id="instafeed"
                        data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn">
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- <!-- Slider Cover -->
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                <div class="item-slick1 bg-overlay1" style="background-image: url(front/images/slide-05.jpg);"
                    data-thumb="front/images/thumb-01.jpg" data-caption="Women’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    {{ __('Women Collection') }} 2018
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    {{ _('New arrivals') }}
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{ route('products.all') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    {{ __('Shop Now') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 bg-overlay1" style="background-image: url(front/images/slide-06.jpg);"
                    data-thumb="front/images/thumb-02.jpg" data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    {{ __('Men New-Season') }}
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    {{ __('Jackets & Coats') }}
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{ route('products.all') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    {{ __('Shop Now') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 bg-overlay1" style="background-image: url(front/images/slide-07.jpg);"
                    data-thumb="front/images/thumb-03.jpg" data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    {{ 'Men Collection' }} 2018
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    {{ __('NEW SEASON') }}
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="{{ route('products.all') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    {{ __('Shop Now') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick1-dots p-lr-10"></div>
        </div>
    </section>


    <!-- Categories -->
    <div class="sec-banner bg0 mt-5 ">
        <div class="p-b-10 m-auto mb-4" style="width: max-content">
            <h3 class="ltext-103 cl5">
                {{ __('Categories Overview') }}
            </h3>
        </div>
        <div class="flex-w flex-c-m">
            @forelse ($categories as $categorie)
                <div class="size-202 m-lr-auto respon4">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{ $categorie->AvatarCategory }}" height="400px" alt="IMG-BANNER">

                        <a href="{{ route('show.products.in.category', $categorie->slug) }}"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    {{ $categorie->name }}
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    {{ $categorie->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    {{ __('Shop Now') }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="container ">

                    <div class="alert alert-danger w-50 text-center m-auto ">
                        {{ 'There Are No Categories' }} <i class="bi bi-emoji-frown-fill"></i>
                    </div>

                </div>
            @endforelse
        </div>
    </div>

    <!-- Latest Products -->
    @include('front.layouts.inc.__products')

    <!-- Load more -->
    <div class="flex-c-m flex-w w-full p-t-60 p-b-60">
        <a href="{{ route('products.all') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            {{ __('Load More') }}
        </a>
    </div>

    <!-- Blog -->
    <section class="sec-blog bg0 ">
        <div class="container">
            <div class="p-b-66 mb-3 ">
                <h3 class="ltext-105 cl5   ">
                    {{ __('Our Blogs') }}
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="blog-detail.html">
                                <img src="{{ asset('front/images/blog-01.jpg') }}" alt="IMG-BLOG">
                            </a>
                        </div>

                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">
                                        By
                                    </span>

                                    <span class="cl5">
                                        Nancy Ward
                                    </span>
                                </span>

                                <span>
                                    <span class="cl4">
                                        on
                                    </span>

                                    <span class="cl5">
                                        July 22, 2017
                                    </span>
                                </span>
                            </div>

                            <h4 class="p-b-12">
                                <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                    8 Inspiring Ways to Wear Dresses in the Winter
                                </a>
                            </h4>

                            <p class="stext-108 cl6">
                                Duis ut velit gravida nibh bibendum commodo. Suspendisse pellentesque mattis augue id
                                euismod. Interdum et male-suada fames
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="blog-detail.html">
                                <img src="{{ asset('front/images/blog-02.jpg') }}" alt="IMG-BLOG">
                            </a>
                        </div>

                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">
                                        By
                                    </span>

                                    <span class="cl5">
                                        Nancy Ward
                                    </span>
                                </span>

                                <span>
                                    <span class="cl4">
                                        on
                                    </span>

                                    <span class="cl5">
                                        July 18, 2017
                                    </span>
                                </span>
                            </div>

                            <h4 class="p-b-12">
                                <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                    The Great Big List of Men’s Gifts for the Holidays
                                </a>
                            </h4>

                            <p class="stext-108 cl6">
                                Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla
                                in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="blog-detail.html">
                                <img src="{{ asset('front/images/blog-03.jpg') }}" alt="IMG-BLOG">
                            </a>
                        </div>

                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">
                                        By
                                    </span>

                                    <span class="cl5">
                                        Nancy Ward
                                    </span>
                                </span>

                                <span>
                                    <span class="cl4">
                                        on
                                    </span>

                                    <span class="cl5">
                                        July 2, 2017
                                    </span>
                                </span>
                            </div>

                            <h4 class="p-b-12">
                                <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                    5 Winter-to-Spring Fashion Trends to Try Now
                                </a>
                            </h4>

                            <p class="stext-108 cl6">
                                Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed
                                hendrerit ligula porttitor. Fusce sit amet maximus nunc
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Product -->
    <section class="sec-blog bg0  p-b-90">
        <div class="container">

            <div class="p-b-10 mb-3">
                <h3 class="ltext-103 cl5">
                    {{ __('Top Products') }}
                </h3>
            </div>
            <div class="row isotope-grid">

                @forelse ($top_products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0 {{ $product->saleProduct }}" data-label="Sale">
                                <img src="{{ $product->product->mainPictureProduct }}" class="img-thumbnail"
                                    style="height: 400px" alt="IMG-PRODUCT">

                                <a href=" {{ route('show.product', $product->product->slug) }} "
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    {{ __('Quick View') }}
                                </a>

                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{ route('show.product', $product->product->slug) }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->product->title }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        <b>
                                            <x-currancy :amount="$product->price" />
                                        </b>
                                    </span>
                                    <span class="badge bg-primary fs-14 m-1">
                                        <i class="bi bi-cash-coin fs-14 m-1">Sales</i>
                                        {{ $product->sales }}</span>
                                </div>

                                @if (!Auth::guard('supplier')->check())
                                    <form action="{{ route('user.favorite.products') }}" method="POST">
                                        @csrf
                                        @method('POST')

                                        <input type="hidden" value="{{ $product->product->id }}" name="product_id">

                                        <x-favourite :productid="$product->product->id" />
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container ">

                        <div class="alert alert-danger w-50 text-center m-auto ">
                            {{ __('There Are No Top Products') }} <i class="bi bi-emoji-frown-fill"></i>
                        </div>

                    </div>
                @endforelse

            </div>
        </div>
    </section> --}}

@endsection
