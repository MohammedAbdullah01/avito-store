@extends('front.layouts.inc.header')
@section('title', 'Edie-Profile')
@section('content')

    @include('front.layouts.inc.nav')

    <x-breadcrumb pagetitle="Edit Profile" lable="user" active="Edit Profile" />

    <x-userProfile.page-wrapper-user />

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <form class="form-horizontal" action="{{ route('user.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Profile Image') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <img class="img-thumbnail" src="{{ $user->ImagUser }}" style="max-width: 104px">
                                <x-form.input-error type="file" name="avatar" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('First Name') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="firstName" :value="$user->firstName" placeholder="Enter The FullName" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Last Name') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="lastName" :value="$user->lastName" placeholder="Enter The FullName" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Email') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="email" :value="$user->email" placeholder="Enter The Email" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Phone') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="phone" :value="$user->phone" placeholder="Enter The Phone Number" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('City') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="city" :value="$user->city" placeholder="Enter The City" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Address') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="location" :value="$user->location" placeholder="Enter The Address" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Gander') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.gander_Select name="gander" :value="$user->gander" />
                            </div>

                            <x-button colorButton="success mt-3" value="Save" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
