@extends('front.layouts.inc.header')
@section('title', 'Edie-Profile')
@section('content')

    @include('front.layouts.inc.nav')

    <x-breadcrumb pagetitle="Edit Profile" lable="Suppplier" active="Edit Profile" />

    <x-supplierProfile.page-wrapper-supplier :supplier="$supplier" />

    <section class="mt-3">
        <div class="container">
            <x-alert />
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <form class="form-horizontal" action="{{ route('supplier.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Profile Image') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <img class="img-thumbnail" src="{{ $supplier->ImgSupplier }}" style="max-width: 104px">
                                <x-form.input-error type="file" name="avatar" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Full Name') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="name" :value="$supplier->name" placeholder="Enter The FullName" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Email') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="email" :value="$supplier->email" placeholder="Enter The Email" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Phone') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="phone" :value="$supplier->phone" placeholder="Enter The Phone Number" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Address') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.input-error name="location" :value="$supplier->location" placeholder="Enter The Address" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Gander') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.gander_Select name="gander" :value="$supplier->gander" />
                            </div>

                            <label class="col-md-4 col-lg-3 col-form-label">
                                {{ __('About Me') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <x-form.textarea name="about" :value="$supplier->about" placeholder="Enter The About Me" />
                            </div>

                            <x-button colorButton="success mt-3" value="Save" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
