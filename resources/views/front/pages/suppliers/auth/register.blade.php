@extends('front.layouts.inc.header')
@section('title', 'Register')
@section('content')

    @include('front.layouts.inc.nav')


    <section class="signin-page account">
        <div class="container">
            <x-alert />
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="{{ route('home') }}">
                            <img src="{{ asset('frontEnd/images/logo.png') }}" alt="">
                        </a>
                        <h2 class="text-center">{{ __('Create An Account Supplier') }}</h2>
                        <p class="text-center small">
                            {{ __('Enter Your Personal Details To Create Account') }}
                        </p>
                        <form action="{{ route('supplier.register.store') }}" method="post" class="text-left clearfix">
                            @csrf
                            @method('POST')

                            @include('front.layouts.inc.__form_register')
                        </form>
                        <p class="mt-20">{{ __('Already hava an account ') }}?
                            <a href="{{ route('supplier.login') }}">
                                {{ __('Login') }}
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
            <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-5 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4" style="margin-left: 70px;">
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
                                        {{ __('Create An Account Supplier') }}
                                    </h5>
                                    <p class="text-center small">
                                        {{ __('Enter Your Personal Details To Create Account') }}
                                    </p>
                                </div>

                                <form action="{{ route('supplier.register.store') }}" method="post"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    @method('POST')

                                    @include('front.layouts.inc.__form_register')

                                    <div class="col-12">
                                        <p class="small mb-0">
                                            {{ __('Already Have An Account') }}
                                            <a href="{{ route('supplier.login') }}">
                                                {{ __('Log In') }}
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
@endsection
