@extends('front.layouts.inc.header')
@section('title', 'Forgot Password')
@section('content')

    @include('front.layouts.inc.nav')


    <section class="forget-password-page account">
        <div class="container">
            <x-alert />
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
                        <form class="text-left clearfix" action="{{ route('user.forgot.password.link') }}" method="POST">
                            @csrf
                            @method('POST')

                            @include('front.layouts.inc.__form_forgotPassword')
                        </form>
                        <p class="mt-20"><a href="{{ route('user.login') }}">
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
            <x-alert/>
            <section class="section register  d-flex flex-column  justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-5">

                        <div class="text-center mb-3" >
                            <a href="index.html" >
                                <img src="{{ asset('admin/assets/img/logo.png') }}" alt="">
                                <img src="{{ asset('front/images/icons/logo-01.png') }}" class="mt-3 m-2" alt="">
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3 shadow-lg mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="pt-2 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">
                                        {{ __('Forgot Password') }}</h5>
                                    <p class="text-center small">Enter Your Email To Send Link</p>
                                </div>

                                <form action="{{ route('user.forgot.password.link') }}" method="POST"
                                    class="row g-3 needs-validation" >
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
