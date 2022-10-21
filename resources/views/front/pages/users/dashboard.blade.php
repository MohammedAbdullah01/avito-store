@extends('front.layouts.inc.header')
@section('title', 'Dashboard')
@section('content')

    @include('front.layouts.inc.nav')


    <x-breadcrumb pagetitle="Dashboard" lable="User" active="Dashboard" />

    <x-userProfile.page-wrapper-user />

    <section class="section dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-xxl-3 col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <a href="{{ route('user.favorite') }}">
                                    <h5 class="card-title mb-3">{{ __('My Favorite') }} </h5>

                                    <div class="d-flex align-items-center text-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center ">
                                            <i class="bi bi-bag-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ 5 }}</h6>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <a href="{{ route('user.orders', Auth::guard('web')->user()->slug) }}">
                                    <h5 class="card-title mb-3">{{ __('My Orders') }} </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-list-ol"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ 5 }}</h6>

                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-3 col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">{{ __('Cancelled Orders') }} </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-x-octagon-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ 5 }}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xxl-3 col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <a href="{{ route('user.invoices', Auth::guard('web')->user()->slug) }}">
                                    <h5 class="card-title mb-3">{{ __('My Invoices') }} </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-receipt-cutoff"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ 5 }}</h6>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
