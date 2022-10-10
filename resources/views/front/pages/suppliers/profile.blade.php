@extends('front.layouts.inc.header')
@section('title', 'Profile')
@section('content')

    @include('front.layouts.inc.nav')

    <x-breadcrumb pagetitle="Dashboard" lable="Suppplier" active="My Profile" />



    <section class="user-dashboard page-wrapper">
        <div class="container">
            <x-alert />
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="{{ route('supplier.profile', $supplier->slug) }}" class="active">Profile Details</a></li>
                        <li><a href="order.html">Orders</a></li>
                        @if (Auth::guard('supplier')->check())
                            @if ($supplier->id == Auth::guard('supplier')->user()->id)
                                <li>
                                    @include('front.pages.suppliers.editProfile')
                                </li>
                                <li><a href="{{ route('supplier.edit', $supplier->slug) }}">{{ __('Change Password') }}</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>




    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media">
                            <div class="pull-left text-center" href="#!">
                                <img class="media-object user-img" src="{{ $supplier->ImgSupplier }}" alt="Image">
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading">Welcome Sir</h2>
                                <p>{{ $supplier->about }}</p>
                                <ul class="user-profile-list">
                                    <li><span>{{ __('Full Name') }}:</span>
                                        {{ $supplier->name }}
                                    </li>
                                    <li>
                                        <span>{{ __('Country') }}:</span>
                                        USA
                                    </li>
                                    <li>
                                        <span>{{ __('Email') }}:</span>
                                        {{ $supplier->email }}
                                    </li>
                                    <li>
                                        <span>{{ __('Phone') }}:</span>
                                        {{ $supplier->phone }}
                                    </li>
                                    <li>
                                        <span>{{ __('Gander') }}:</span>
                                        {{ $supplier->gander }}
                                    </li>
                                    <li>
                                        <span>{{ __('Address') }}:</span>
                                        {{ $supplier->location }}
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


    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>My Products</h2>
                        @if (Auth::guard('supplier')->check())
                            @if ($supplier->id == Auth::guard('supplier')->user()->id)
                                @include('front.pages.suppliers.modal.create')
                            @endif
                        @endif
                    </div>
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media" style="overflow: inherit">
                            @include('front.layouts.inc.__products')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









    {{-- <div class="container mt-3">

        <!-- Nav Profile Breadcrumb -->
        <x-breadcrumb pagetitle="My Profile" lable="Suppplier" active="My Profile" />
        <x-alert />

        <!-- Section Profile -->
        <section class="section profile">
            <div class="row">

                <!-- Verification Card -->
                <div class="col-xl-4">
                    <div class="card shadow-lg mb-5 bg-body rounded">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ $supplier->ImgSupplier }}" class="rounded-5 h-75 w-75">
                            <h2 class="text-capitalize">{{ $supplier->name }}</h2>
                            <h3>{{ __('Supplier') }}</h3>

                            <div class="social-links mt-2">
                                <a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>

                        @if (Auth::guard('supplier')->check())
                            <!--list-group Count Activated Products & Products Not Activated & The Sales -->
                            <ul class="list-group list-group-flush ">

                                <li class="list-group-item">
                                    <label class="col-form-label">{{ __('Activated Products') }}
                                        <span class="float-end badge bg-danger">
                                            {{ $supplier->products()->where('activate', 1)->count() }}
                                        </span>
                                    </label>
                                </li>

                                <li class="list-group-item">
                                    <label class="col-form-label">{{ __('Products Not Activated') }}
                                        <span class="float-end badge bg-danger">
                                            {{ $supplier->products()->where('activate', 0)->count() }}
                                        </span>
                                    </label>
                                </li>

                                <li class="list-group-item ">
                                    <label class="col-form-label">{{ __('The Sales') }}
                                        <span class="float-end badge bg-danger">
                                            <x-currancy :amount="$subtotal->the_total_amount" />
                                        </span>
                                    </label>
                                </li>

                            </ul>
                        @endif

                    </div>
                </div>

                <!--Bordered Tabs -->
                <div class="col-xl-8">
                    <div class="card shadow-lg  mb-5 bg-body rounded">
                        <div class="card-body pt-3">

                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">{{ __('Overview') }}</button>
                                </li>

                                @if (Auth::guard('supplier')->check())

                                    @if ($supplier->id == Auth::guard('supplier')->user()->id)
                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#profile-edit">{{ __('Edit Profile') }}</button>
                                        </li>

                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#profile-change-password">{{ __('Change Password') }}</button>
                                        </li>
                                    @endif

                                @endif

                            </ul>

                            <div class="tab-content pt-2">
                                <!-- Profile Overview -->
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">{{ __('About') }}</h5>
                                    <p class="small fst-italic">
                                        @empty($supplier->about)
                                            <span class="badge text-bg-danger">Empty</span>
                                        @endempty
                                        {{ $supplier->about }}
                                    </p>
                                    <h5 class="card-title">{{ __('Profile Details') }}</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('Full Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $supplier->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('E-email') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $supplier->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Phone') }}</div>
                                        <div class="col-lg-9 col-md-8">
                                            @empty($supplier->phone)
                                                <span class="badge text-bg-danger">Empty</span>
                                            @endempty
                                            {{ $supplier->phone }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Gender') }}</div>
                                        <div class="col-lg-9 col-md-8">
                                            @empty($supplier->gander)
                                                <span class="badge text-bg-danger">Empty</span>
                                            @endempty
                                            {{ $supplier->gander }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"> {{ __('Address') }} </div>
                                        <div class="col-lg-9 col-md-8">
                                            @empty($supplier->location)
                                                <span class="badge text-bg-danger">Empty</span>
                                            @endempty
                                            {{ $supplier->location }}
                                        </div>
                                    </div>
                                </div>

                                @if (Auth::guard('supplier')->check())
                                    @if ($supplier->id == Auth::guard('supplier')->user()->id)
                                        <!-- Form Edit Profile -->
                                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                            <form class="form-horizontal" action="{{ route('supplier.update') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <x-profile.image-profile name="avatar" :value="$supplier->ImgSupplier"
                                                    lable="Profile Image" />

                                                <x-profile.input-profile name="name" :value="$supplier->name"
                                                    placeholder="Enter The FullName" lable="Full Name" />

                                                <x-profile.input-profile name="email" :value="$supplier->email"
                                                    placeholder="Enter The Email" lable="Email" />

                                                <x-profile.textarea-profile name="about" :value="$supplier->about"
                                                    placeholder="Enter The About Me" lable="About Me" />

                                                <x-profile.input-profile name="phone" :value="$supplier->phone"
                                                    placeholder="Enter The Phone Number" lable="Phone" />

                                                <x-profile.input-profile name="location" :value="$supplier->location"
                                                    placeholder="Enter The Address" lable="Address" />

                                                <x-profile.select-profile name="gander" :value="$supplier->gander" lable="Gander" />

                                                <x-profile.button-profile lable="Save Changes" />

                                            </form>
                                        </div>

                                        <!-- Form Change Password -->
                                        <div class="tab-pane fade pt-3" id="profile-change-password">
                                            <form action=" {{ route('supplier.change.password', $supplier->id) }} "
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <x-profile.input-profile type="password" name="old_password"
                                                    placeholder="Enter The Old Password" lable="Current Password" />

                                                <x-profile.input-profile type="password" name="password"
                                                    placeholder="Enter The New Password" lable="New Password" />

                                                <x-profile.input-profile type="password" name="password_confirmation"
                                                    placeholder="Enter The Password Confirmation"
                                                    lable="Password Confirmation" />

                                                <x-profile.button-profile lable="Change Password" />

                                            </form>
                                        </div>
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- My Products -->
                <div class="col-12">
                    <div class="card shadow-lg p-3  bg-body rounded">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-myproduct">
                                        <span class="mtext-106 cl">
                                            {{ __('My Products') }}
                                        </span>
                                    </button>
                                </li>
                                @if (Auth::guard('supplier')->check())
                                    @if ($supplier->id == Auth::guard('supplier')->user()->id)
                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#profile-reports">
                                                <span class="mtext-106 cl">
                                                    {{ __('Reports') }}
                                                </span>
                                            </button>
                                        </li>
                                    @endif
                                @endif

                            </ul>

                            <div class="tab-content ">

                                <!-- Section My Products  -->
                                @if (Auth::guard('supplier')->check())
                                    @if ($supplier->id == Auth::guard('supplier')->user()->id)
                                        @include('front.pages.suppliers.modal.create')
                                    @endif
                                @endif

                                <div class="tab-pane fade show active profile-overview" id="profile-myproduct">

                                    <!-- Latest Products  -->
                                    <div class="row isotope-grid">
                                        @forelse ($products as $product)
                                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
                                                <!-- Block2 -->
                                                <div class="block2">
                                                    <div class="block2-pic hov-img0 {{ $product->saleProduct }}"
                                                        data-label="Sale">
                                                        <img src="{{ $product->mainPictureProduct }}"
                                                            class="img-thumbnail" style="height: 300px"
                                                            alt="IMG-PRODUCT">

                                                        <a href=" {{ route('show.product', $product->slug) }} "
                                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                                            {{ __('Quick View') }}
                                                        </a>

                                                    </div>

                                                    <div class="block2-txt flex-w flex-t p-t-14">
                                                        <div class="block2-txt-child1 flex-col-l ">
                                                            <a href="{{ route('show.product', $product->slug) }}"
                                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                                {{ $product->title }}
                                                            </a>

                                                            <span class="stext-105 cl3">
                                                                @if ($product->sale_price)
                                                                    <del>
                                                                        <x-currancy :amount="$product->price" />
                                                                    </del> /
                                                                    <x-currancy :amount="$product->sale_price" />
                                                                @else
                                                                    <x-currancy :amount="$product->price" />
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>

                                                @if (Auth::guard('supplier')->check())
                                                    @if ($supplier->id == Auth::guard('supplier')->user()->id)
                                                        <hr>
                                                        <div class="d-inline-block ">

                                                            @include('front.pages.suppliers.modal.show')

                                                            @include('front.pages.suppliers.modal.edit')

                                                            @include('front.pages.suppliers.modal.delete')
                                                            <span
                                                                class="{{ $product->ActivateProduct }} m-2 ">{{ $product->activate ? '' : ' Is Being Reviewed' }}</span>
                                                        </div>
                                                    @endif
                                                @endif

                                            </div>
                                        @empty
                                            <div class="container ">

                                                <div class="alert alert-danger w-50 text-center m-auto ">
                                                    {{ __('There Are No Products') }} <i
                                                        class="bi bi-emoji-frown-fill"></i>
                                                </div>

                                            </div>
                                        @endforelse
                                    </div>

                                    <!-- Load more -->
                                    <div class="flex-c-m flex-w w-full p-t-60 p-b-60">
                                        {{ $products->links() }}
                                    </div>
                                </div>

                                <!-- Table Reports -->
                                @if (Auth::guard('supplier')->check())
                                    @if ($supplier->id == Auth::guard('supplier')->user()->id)

                                        <div class="tab-pane fade pt-3" id="profile-reports">
                                            <div class="card shadow-lg p-3 mb-5 bg-body rounded ">
                                                <div class="card-body">
                                                    @php
                                                        $i = 1;
                                                    @endphp

                                                    <table class="table table table-hover">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Product Name</th>
                                                                <th scope="col">Order Count</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($orderProducts as $reports)
                                                                <tr>
                                                                    <th scope="row">{{ $i++ }}</th>
                                                                    <td>{{ $reports->product_name }}</td>
                                                                    <td>{{ $reports->product_count }}</td>
                                                                    <td>{{ $reports->sales }}</td>
                                                                    <td>
                                                                        <x-currancy :amount="$reports->price" />
                                                                    </td>
                                                                    <td>
                                                                        <x-currancy :amount="$reports->total" />
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <th colspan="6">
                                                                        <div
                                                                            class="alert alert-danger w-50 m-auto text-center">
                                                                            {{ 'There No Reports ' }} <i
                                                                                class="bi bi-emoji-frown-fill"></i>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            @endforelse
                                                            @if ($subtotal->the_total_amount)
                                                                <tr class="table-dark">
                                                                    <th><i class="bi bi-cash-coin"></i></th>
                                                                    <th colspan="4">The Total Amount</th>
                                                                    <th>
                                                                        <x-currancy :amount="$subtotal->the_total_amount" />
                                                                    </th>
                                                                </tr>
                                                            @endif

                                                        </tbody>
                                                    </table>

                                                    {{ $orderProducts->links() }}
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div> --}}
@endsection
