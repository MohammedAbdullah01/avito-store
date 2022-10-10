<span class="btn btn-main" data-toggle="modal" data-target="#edit-profile-supplier{{ $supplier->name }}">
    <i class="bi bi-pencil-square"></i>
    Edit Profile
</span>
<!-- Modal -->
<div class="modal product-modal fade" id="edit-profile-supplier{{ $supplier->name }}">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="tf-ion-close"></i>
    </button>
    <div class="modal-dialog " >
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <form class="form-horizontal" action="{{ route('supplier.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label  class="col-md-4 col-lg-3 col-form-label">
                                {{ __('Profile Image') }}
                            </label>

                            <div class="col-md-8 col-lg-9">
                                <img class="img-thumbnail" src="{{ $supplier->ImgSupplier }}" style="max-width: 104px">
                                <x-input-error type="file"  name="avatar" />
                            </div>
                            {{-- <x-profile.image-profile name="avatar" lable="Profile Image" /> --}}

                            <x-profile.input-profile name="name" :value="$supplier->name" placeholder="Enter The FullName"
                                lable="Full Name" />

                            <x-profile.input-profile name="email" :value="$supplier->email" placeholder="Enter The Email"
                                lable="Email" />

                            <x-profile.textarea-profile name="about" :value="$supplier->about"
                                placeholder="Enter The About Me" lable="About Me" />

                            <x-profile.input-profile name="phone" :value="$supplier->phone"
                                placeholder="Enter The Phone Number" lable="Phone" />

                            <x-profile.input-profile name="location" :value="$supplier->location" placeholder="Enter The Address"
                                lable="Address" />

                            <x-profile.select-profile name="gander" :value="$supplier->gander" lable="Gander" />

                            <x-button colorButton="success mt-3" value="Save" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->


























    {{--




@extends('front.layouts.inc.header')
@section('title', 'Profile')
@section('content')

    @include('front.layouts.inc.nav')

    <x-breadcrumb pagetitle="Edit Profile" lable="Suppplier" active="Edit Profile" />
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="{{ route('supplier.profile', $supplier->slug) }}">Profile Details</a></li>
                        <li><a href="order.html">Orders</a></li>
                        <li><a class="active" href="{{ route('supplier.edit', $supplier->slug) }}">Edit Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

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

                            <x-profile.image-profile name="avatar" :value="$supplier->ImgSupplier" lable="Profile Image" />

                            <x-profile.input-profile name="name" :value="$supplier->name" placeholder="Enter The FullName"
                                lable="Full Name" />

                            <x-profile.input-profile name="email" :value="$supplier->email" placeholder="Enter The Email"
                                lable="Email" />

                            <x-profile.textarea-profile name="about" :value="$supplier->about" placeholder="Enter The About Me"
                                lable="About Me" />

                            <x-profile.input-profile name="phone" :value="$supplier->phone" placeholder="Enter The Phone Number"
                                lable="Phone" />

                            <x-profile.input-profile name="location" :value="$supplier->location" placeholder="Enter The Address"
                                lable="Address" />

                            <x-profile.select-profile name="gander" :value="$supplier->gander" lable="Gander" />

                            <x-button colorButton="success mt-3" value="Save" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}
