@extends('front.layouts.inc.header')
@section('title', 'Products In Categorty')
@section('content')

    @include('front.layouts.inc.nav')

    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>{{ __('Products In Categorty') }}</h2>
                </div>
            </div>
            @include('front.layouts.inc.__products')

            {{ $products->links() }}
        </div>
    </section>
@endsection
