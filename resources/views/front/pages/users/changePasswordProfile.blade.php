@extends('front.layouts.inc.header')
@section('title', 'Change-Password')
@section('content')

    @include('front.layouts.inc.nav')

    <x-breadcrumb pagetitle="Change Password" lable="User" active="Change Password" />

    <x-userProfile.page-wrapper-user  />

    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <form class="form-horizontal" action="{{ route('user.change.password', $user->id) }} " method="POST">
                            @csrf
                            @method('PUT')

                            <label class="col-md-4 col-lg-3 col-form-label mt-3">
                                {{ __('Current Password') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error type="password" name="old_password"
                                    placeholder="Enter The Old Password" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label mt-3">
                                {{ __('New Password') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error type="password" name="password" placeholder="Enter The New Password" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label mt-3">
                                {{ __('Password Confirmation') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error type="password" name="password_confirmation"
                                    placeholder="Enter The Password Confirmation" />
                            </div>

                            <x-button colorButton="success mt-3" value="Save" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
