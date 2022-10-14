@extends('front.layouts.inc.header')
@section('title', 'Home')
@section('content')

    @include('front.layouts.inc.nav')
    <section class="empty-cart page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <i class="tf-ion-ios-cart-outline"></i>
                        <h2 class="text-center">Your cart is currently empty.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, sed.</p>
                        <a href="{{route('products.all')}}" class="btn btn-main mt-20">Return to shop</a>
                    </div>
                </div>
            </div>
    </section>
@endsection
