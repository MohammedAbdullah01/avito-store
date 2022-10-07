@extends('front.layouts.inc.header')
@section('title', 'Update Password')
@section('content')

    @include('front.layouts.inc.nav')
    <main>
        <div class="container">
            <section class="section register d-flex flex-column  justify-content-center py-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-5 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex py-4" style="margin-left: 70px;">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('admin/assets/img/logo.png') }}" alt="">
                                <span class="d-none d-lg-block" style="margin-top: 10px;margin-left: 10px;">NiceAdmin</span>
                            </a>
                        </div>

                        <div class="card mb-3 shadow-lg p-3 mb-5 bg-body rounded">
                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">{{ __('Update You Password') }}
                                    </h5>
                                    <p class="text-center small">{{ __('Enter your New Password') }}</p>
                                </div>

                                <form action="{{ route('user.confirm.password.update') }}" method="post"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')

                                    @include('front.layouts.inc.__form_confirmPassword')
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
