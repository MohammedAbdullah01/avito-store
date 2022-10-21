@extends('front.layouts.inc.header')
@section('title', 'User-Profile')
@section('content')

    @include('front.layouts.inc.nav')


    <x-breadcrumb pagetitle="Profile Details" lable="User" active="Profile Details" />

    <x-userProfile.page-wrapper-user :user="$user" />

    <section class="section">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
