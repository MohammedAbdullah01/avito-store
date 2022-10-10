@extends('front.layouts.inc.header')
@section('title', 'Login')
@section('content')

    @include('front.layouts.inc.nav')


    <section class="signin-page account">
        <div class="container">
            <x-alert />
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="{{route('home')}}">
                            <img src="{{ asset('frontEnd/images/logo.png') }}" alt="">
                        </a>
                        <h2 class="text-center">Welcome Back</h2>
                        <form class="text-left clearfix" method="POST" action="{{ route('user.login.check') }}">
                            @csrf
                            @method('POST')
                            @include('front.layouts.inc.__form_login')
                        </form>
                        <p class="mt-20">New in this site ?<a href="{{ route('user.register') }}">
                                {{ __('Create an account') }}
                            </a>
                        </p>
                        <a href="{{ route('user.forgot.password') }}">
                            {{ __('Forgot Password') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection





    {{-- <main>
        <div class="container">
            <x-alert/>
            <section class="section register d-flex flex-column justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-5 d-flex flex-column align-items-center justify-content-center">

                        <div class="text-center mb-3" >
                            <a href="index.html" >
                                <img src="{{ asset('admin/assets/img/logo.png') }}" alt="">
                                <img src="{{ asset('front/images/icons/logo-01.png') }}" class="mt-3 m-2" alt="">
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3 shadow-lg  mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="pt-2 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">
                                        {{ __('Login to Your Account User') }}</h5>
                                    <p class="text-center small">
                                        {{__("Enter your Email & password to login")}}
                                    </p>
                                </div>

                                <form action="{{ route('user.login.check') }}" method="POST"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    @method('POST')

                                    @include('front.layouts.inc.__form_login')

                                    <div class="col-12">
                                        <p class="small mb-0">
                                            {{ __("Don't Have Account") }}
                                            <a href="{{ route('user.register') }}">
                                                {{ __('Create an account') }}
                                            </a>
                                        </p>
                                    </div>

                                    <div class="col-12">
                                        <p class="small mb-0">
                                            <a href="{{ route('user.forgot.password') }}">
                                                {{ __('Forgot Password') }}
                                            </a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </main> --}}
{{-- @endsection --}}
