@extends('front.layouts.inc.header')
@section('title', 'Forgot Password')
@section('content')

    @include('front.layouts.inc.nav')


    <section class="forget-password-page account">
        <div class="container">
            <x-alert/>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="{{ route('home') }}">
                            <img src="{{ asset('frontEnd/images/logo.png') }}" alt="">
                        </a>
                        <h2 class="text-center">{{ __('Welcome Back') }}</h2>
                        <p>
                            {{ __('Please enter the email address for your account. A verification code will be sent to you.
                                                            Once you have received the verification code, you will be able to choose a new password for
                                                            your account.') }}
                        </p>
                        <form class="text-left clearfix" action="{{ route('supplier.forgot.password.link') }}"
                            method="POST">
                            @csrf
                            @method('POST')

                            @include('front.layouts.inc.__form_forgotPassword')
                        </form>
                        <p class="mt-20"><a href="{{ route('supplier.login') }}">
                                {{ __('Back to log in') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{-- <main>
        <div class="container">
            <section class="section register  d-flex flex-column  justify-content-center py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-5 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex py-4" style="margin-left: 70px;">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <span class="d-none d-lg-block" style="margin-top: 10px;margin-left: 10px;">
                                    <img src="{{ asset('front/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                                </span>
                            </a>
                        </div>

                        <div class="card mb-3 shadow-lg p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">
                                        {{ __('Forgot Password') }}</h5>
                                    <p class="text-center small">{{ __('Enter Your Email To Send Link') }}</p>
                                </div>

                                <form action="{{ route('supplier.forgot.password.link') }}" method="POST"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    @method('POST')

                                    @include('front.layouts.inc.__form_forgotPassword')
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </main> --}}
@endsection
