@extends('front.layouts.inc.header')
@section('title', 'Tag')
@section('content')

    @include('front.layouts.inc.nav')

    <section class="bg0 p-t-75 p-b-219">

        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5 mb-5">
                    {{ $tags->slug }}
                </h3>
            </div>

            <div class="row isotope-grid">

                @forelse ($tags->products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">

                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0 {{ $product->saleProduct }}" data-label="Sale">
                                <img src="{{ $product->mainPictureProduct }}" height="400px" alt="IMG-PRODUCT">

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
                                    <form action="{{ route('user.favorite.products') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <a class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <x-favourite :productid="$product->id" />
                                        </a>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="container">

                        <div class="alert alert-danger mt-5 mb-5  w-50 text-center m-auto ">
                            {{ 'There Are No Products Associated With The Tag ' }} <i class="bi bi-emoji-frown-fill"></i>
                        </div>

                    </div>
                @endforelse

            </div>
        </div>

    </section>

@endsection
