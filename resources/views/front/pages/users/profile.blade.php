@extends('front.layouts.inc.header')
@section('title', 'Profile User')
@section('content')

    @include('front.layouts.inc.nav')

    <div class="container">

        <!-- Nav Profile Breadcrumb -->
        <x-breadcrumb pagetitle="My Profile" lable="Member" active="My Profile" />

        <section class="user-dashboard page-wrapper">
            <div class="container">
                <x-alert/>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline dashboard-menu text-center">
                            <li><a href="dashboard.html">Dashboard</a></li>
                            <li><a href="{{ route('user.profile', $user->slug) }}" class="active">Profile Details</a></li>
                            <li><a href="order.html">Orders</a></li>
                                    <li><a href="{{ route('user.edit', $user->slug) }}">Edit Profile</a></li>
                                    <li><a href="{{ route('user.edit', $user->slug) }}">{{ __('Change Password') }}</a>
                                    </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section profile">
            <div class="row">

                <x-alert />

                <!-- Verification Card -->
                <div class="col-xl-4">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ $user->ImagUser }}" alt="{{ $user->avatar }}" class="rounded-5 h-75 w-75">

                            <h2 class="text-capitalize">{{ $user->name }}</h2>
                            <h3>{{ __('Member') }}</h3>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"></li>
                            <li class="list-group-item">
                                <h6 class="text-primary">{{ __('Products Favorite') }}
                                    <span class="float-end badge bg-info text-dark">
                                        {{ $favourites_products->count() }}
                                    </span>
                                </h6>

                            </li>

                            <li class="list-group-item ">
                                <h6 class="text-primary">{{ __('Products Purchased') }}
                                    <span class="float-end badge bg-info text-dark">
                                        {{ $number_of_purchases }}
                                    </span>
                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Bordered Tabs -->
                <div class="col-xl-8">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="card-body pt-3">

                            <!-- Nav Tabs Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">{{ __('Overview') }}</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-edit">{{ __('Edit Profile') }}</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">{{ __('Change Password') }}</button>
                                </li>

                            </ul>

                            <!-- Start Tab Content -->
                            <div class="tab-content pt-2">

                                {{-- Profile Overview --}}
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">{{ __('About Me') }}</h5>
                                    <p class="small fst-italic">
                                        @empty($user->about)
                                            <span class="badge text-bg-danger">Empty</span>
                                        @endempty
                                        {{ $user->about }}
                                    </p>
                                    <h5 class="card-title">{{ __('Profile Details') }}</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">{{ __('Full Name') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Email') }}</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Phone') }}</div>
                                        <div class="col-lg-9 col-md-8">
                                            @empty($user->phone)
                                                <span class="badge text-bg-danger">Empty</span>
                                            @endempty
                                            {{ $user->phone }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">{{ __('Gander') }}</div>
                                        <div class="col-lg-9 col-md-8">
                                            @empty($user->gander)
                                                <span class="badge text-bg-danger">Empty</span>
                                            @endempty
                                            {{ $user->gander }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"> {{ __('Address') }} </div>
                                        <div class="col-lg-9 col-md-8">
                                            @empty($user->location) <span
                                                class="badge text-bg-danger">Empty</span> @endempty
                                            {{ $user->location }}
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Form Edit Profile -->
                                    <form class="form-horizontal" action="{{ route('user.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <x-profile.image-profile name="avatar" :value="$user->ImagUser" lable="Profile Image" />

                                        <x-profile.input-profile name="name" :value="$user->name"
                                            placeholder="Enter The FullName" lable="Full Name" />

                                        <x-profile.input-profile name="email" :value="$user->email"
                                            placeholder="Enter The Email" lable="Email" />

                                        <x-profile.textarea-profile name="about" :value="$user->about"
                                            placeholder="Enter The About Me" lable="About Me" />

                                        <x-profile.input-profile name="phone" :value="$user->phone"
                                            placeholder="Enter The Phone Number" lable="Phone" />

                                        <x-profile.input-profile name="location" :value="$user->location"
                                            placeholder="Enter The Address" lable="Address" />

                                        <x-profile.select-profile name="gander" :value="$user->gander" lable="Gander" />

                                        <x-profile.button-profile lable="Save Changes" />
                                    </form>
                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Form Change Password -->
                                    <form action=" {{ route('user.change.password', $user->id) }} " method="POST">
                                        @csrf
                                        @method('PUT')
                                        <x-profile.input-profile type="password" name="old_password"
                                            placeholder="Enter The Old Password" lable="Current Password" />

                                        <x-profile.input-profile type="password" name="password"
                                            placeholder="Enter The New Password" lable="New Password" />

                                        <x-profile.input-profile type="password" name="password_confirmation"
                                            placeholder="Enter The Password Confirmation" lable="Password Confirmation" />

                                        <x-profile.button-profile lable="Change Password" />
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- WishList && Purchases --}}
                <div class="col-md-12">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="card-body pt-3">

                            {{-- Bordered Tabs --}}
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-wishlist">
                                        <span class="mtext-106 cl">
                                            {{ __('WishList') }}
                                        </span>
                                    </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-purchases">
                                        <span class="mtext-106 cl">
                                            {{ __('Purchases') }}
                                        </span>
                                    </button>
                                </li>

                            </ul>

                            <div class="tab-content pt-2">

                                {{-- tab Profile Wishlist --}}
                                <div class="tab-pane fade show active" id="profile-wishlist">
                                    <section class="bg0 p-t-23 mb-5 ">
                                        <div class="container">

                                            <div class="row isotope-grid">
                                                @forelse ($favourites_products as $product)
                                                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
                                                        <!-- Block2 -->
                                                        <div class="block2">
                                                            <div class="block2-pic hov-img0 {{ $product->saleProduct }}"
                                                                data-label="Sale">
                                                                <img src="{{ $product->mainPictureProduct }}"
                                                                    height="400px" alt="IMG-PRODUCT">

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
                                                                <div class="block2-txt-child2 flex-r p-t-3">
                                                                    <form action="{{ route('user.favorite.products') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <input type="hidden" value="{{ $product->id }}"
                                                                            name="product_id">
                                                                        <a
                                                                            class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                                            <x-favourite :productid="$product->id" />
                                                                        </a>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty

                                                    <div class="alert alert-danger w-50 text-center m-auto ">
                                                        {{ __('There Are No Products In Wishlist') }} <i
                                                            class="bi bi-emoji-frown-fill"></i>
                                                    </div>
                                                @endforelse
                                            </div>

                                            <!-- Load more -->
                                            <div class="p-t-10 p-b-10">
                                                {{ $favourites_products->links() }}
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <!-- Products Purchases -->
                                <div class="tab-pane fade  pt-3" id="profile-purchases">

                                    <table class="table table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Details</th>
                                                <th>Order Number</th>
                                                <th>Customer Name</th>
                                                <th>Phone</th>
                                                <th>City</th>
                                                <th>Address</th>
                                                <th>Order Status</th>
                                                <th>Payment Status</th>
                                                <th>Total</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orderuser as $order)
                                                <tr>
                                                    <td>
                                                        @include('front.pages.users.modal.details_order')
                                                    </td>
                                                    <th>#{{ $order->number }}</th>
                                                    <td>{{ $order->first_name }}</td>
                                                    <td>{{ $order->phone }}</td>
                                                    <td>{{ $order->city }}</td>
                                                    <td>
                                                        <p class="card-tex">{{ $order->address }}</p>
                                                    </td>

                                                    <td>
                                                        <span class="{{ $order->OrderStatus }}">
                                                            {{ $order->status }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="{{ $order->OrderPyamentStatus }}">
                                                            {{ $order->payment_status }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <x-currancy :amount="$order->total" />
                                                    </td>

                                                    <td>
                                                        {{ $order->created_at->format('d-M-Y h:i A') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9">
                                                        <div class="alert alert-danger text-center m-auto w-50">
                                                            {{ __('No There Orders ') }} <i
                                                                class="bi bi-emoji-frown-fill"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
