@extends('front.layouts.inc.header')
@section('title', 'Products')
@section('content')

    @include('front.layouts.inc.nav')

    <!-- Latest Products -->
    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>{{ __('Products') }}</h2>
                </div>
                @include('front.layouts.inc.__products')
            </div>
            <!-- Load more -->
            {{ $products->links() }}
        </div>
    </section>
@endsection
