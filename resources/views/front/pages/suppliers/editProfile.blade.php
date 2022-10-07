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
@endsection
