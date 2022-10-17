@extends('front.layouts.inc.header')
@section('title', 'User-Profile')
@section('content')

    @include('front.layouts.inc.nav')


    <x-breadcrumb pagetitle="Profile Details" lable="User" active="Profile Details" />

    <x-userProfile.page-wrapper-user :user="$user" />

    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media">
                            <div class="pull-left text-center" href="#!">
                                <img class="media-object user-img" src="{{ $user->ImagUser }}" alt="Image">
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading">Welcome Sir</h2>
                                <p>{{ $user->about }}</p>
                                <ul class="user-profile-list">
                                    <li><span>{{ __('Full Name') }}:</span>
                                        {{ $user->UserName }}
                                    </li>
                                    <li>
                                        <span>{{ __('Country') }}:</span>
                                        USA
                                    </li>
                                    <li>
                                        <span>{{ __('Email') }}:</span>
                                        {{ $user->email }}
                                    </li>
                                    <li>
                                        <span>{{ __('Phone') }}:</span>
                                        {{ $user->phone }}
                                    </li>
                                    <li>
                                        <span>{{ __('Gander') }}:</span>
                                        {{ $user->gander }}
                                    </li>
                                    <li>
                                        <span>{{ __('Address') }}:</span>
                                        {{ $user->location }}
                                    </li>

                                </ul>
                            </div>
                            <ul class="social-media text-center">
                                <li>
                                    <a href="https://www.facebook.com/themefisher">
                                        <i class="tf-ion-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/themefisher">
                                        <i class="tf-ion-social-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/themefisher">
                                        <i class="tf-ion-social-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-3 mb-5" id="favorite">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>{{ __('My Favorite products') }}</h2>
                    </div>
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media" style="overflow: inherit">
                            @include('front.layouts.inc.__products')
                            {{ $products->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
