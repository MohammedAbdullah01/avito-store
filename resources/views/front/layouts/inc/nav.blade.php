<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <ul class="top-menu text-start list-inline">

                        <!-- Dropdown !Authantcation  Sig In => Supplier , User  && Register => Supplier , User  -->
                        @if (!Auth::guard('supplier')->check() && !Auth::guard('web')->check())
                            <!-- li Sig In  -->
                            <li class="dropdown search dropdown-slide">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                    {{ __('Sig In') }}
                                </a>

                                <ul class="dropdown-menu search-dropdown" style="inset: auto; margin: 6px">
                                    <li>
                                        <h5 class="media-heading">
                                            <a href="{{ route('user.login') }}">{{ __('User Sig In') }}</a>
                                        </h5>
                                    </li>
                                    <hr>
                                    <li>
                                        <h5 class="media-heading">
                                            <a href="{{ route('supplier.login') }}">{{ __('supplier Sig In') }}</a>
                                        </h5>
                                    </li>
                                </ul>
                            </li>

                            <!-- li Register  -->
                            <li class="dropdown search dropdown-slide">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                    {{ __('Register') }}
                                </a>
                                <ul class="dropdown-menu search-dropdown" style="inset: auto; margin: 6px">
                                    <li>
                                        <h5 class="media-heading">
                                            <a href="{{ route('user.register') }}">{{ __('User Register') }}</a>
                                        </h5>
                                    </li>
                                    <hr>
                                    <li>
                                        <h5 class="media-heading">
                                            <a href="{{ route('supplier.register') }}">{{ __('supplier Register') }}</a>
                                        </h5>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <!-- Dropdown Supplier Authantcation -->
                        @if (Auth::guard('supplier')->check())
                            <li class="dropdown search dropdown-slide">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                    <img src="{{ Auth::guard('supplier')->user()->ImgSupplier }}" width="30"
                                        height="30" alt="Profile" class="rounded-circle">
                                    {{ Auth::guard('supplier')->user()->SupplierName }}
                                </a>
                                <ul class="dropdown-menu search-dropdown"
                                    style="left: 55px; right:unset; top: 60%; margin: 6px">
                                    <li>
                                        <h5 class="media-heading">
                                            <i class="bi bi-person"></i>
                                            <a
                                                href="{{ route('supplier.profile', Auth::guard('supplier')->user()->slug) }}">My
                                                Profile</a>
                                        </h5>
                                    </li>

                                    <hr>

                                    <li>
                                        <h5 class="media-heading">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <a href="{{ route('supplier.logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('supplier_logout').submit();">
                                                <strong>{{ __('Sign Out') }}</strong>
                                            </a>
                                        </h5>
                                        <form action="{{ route('supplier.logout') }}" method="post"
                                            id="supplier_logout">
                                            @csrf
                                            @method('POST')
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <!-- Dropdown User Authantcation -->
                        @if (Auth::guard('web')->check())
                            <li class="dropdown search dropdown-slide">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                    <img src="{{ Auth::guard('web')->user()->ImagUser }}" width="30" height="30"
                                        alt="Profile" class="rounded-circle">
                                    {{ Auth::guard('web')->user()->UserName }}
                                </a>
                                <ul class="dropdown-menu search-dropdown"
                                    style="left: 55px; right:unset; top: 60%; margin: 6px">
                                    <li>
                                        <h5 class="media-heading">
                                            <i class="bi bi-person"></i>
                                            <a href="{{ route('user.profile', Auth::guard('web')->user()->slug) }}">My
                                                Profile</a>
                                        </h5>
                                    </li>

                                    <hr>

                                    <li>
                                        <h5 class="media-heading">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <a href="{{ route('user.logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('user_logout').submit();">
                                                <strong>{{ __('Sign Out') }}</strong>
                                            </a>
                                        </h5>
                                        <form action="{{ route('user.logout') }}" method="post" id="user_logout">
                                            @csrf
                                            @method('POST')
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>

            <!-- Site Logo -->
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="logo text-center">
                    <a href="{{ route('home') }}">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">AVIATO</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-xs-12 col-sm-4">

                <ul class="top-menu text-end list-inline">

                    <!-- Cart -->
                    <x-cart-menu />

                    <!-- Search -->
                    <li class="dropdown search dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-ios-search-strong"></i> Search</a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="post"><input type="search" class="form-control"
                                        placeholder="Search...">
                                </form>
                            </li>
                        </ul>
                    </li>

                    <!-- Languages -->
                    <li class="commonSelect">
                        <select class="form-control">
                            <option>EN</option>
                            <option>DE</option>
                            <option>FR</option>
                            <option>ES</option>
                        </select>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>


<!-- Main Menu Section -->
<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- / .navbar-header -->

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">

                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="index.html">Home</a>
                    </li><!-- / Home -->


                    <!-- Elements -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Shop <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Basic -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Pages</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="confirmation.html">Confirmation</a></li>

                                    </ul>
                                </div>

                                <!-- Layout -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Layout</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="product-single.html">Product Details</a></li>
                                        <li><a href="shop-sidebar.html">Shop With Sidebar</a></li>

                                    </ul>
                                </div>

                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Elements -->


                    <!-- Pages -->
                    <li class="dropdown full-width dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Pages <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Introduction -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Introduction</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </div>

                                <!-- Contact -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Dashboard</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="dashboard.html">User Interface</a></li>
                                        <li><a href="order.html">Orders</a></li>
                                        <li><a href="address.html">Address</a></li>
                                        <li><a href="profile-details.html">Profile Details</a></li>
                                    </ul>
                                </div>

                                <!-- Utility -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Utility</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="login.html">Login Page</a></li>
                                        <li><a href="signin.html">Signin Page</a></li>
                                        <li><a href="forget-password.html">Forget Password</a></li>
                                    </ul>
                                </div>

                                <!-- Mega Menu -->
                                <div class="col-sm-3 col-xs-12">
                                    <a href="shop.html">
                                        <img class="img-responsive" src="images/shop/header-img.jpg"
                                            alt="menu image" />
                                    </a>
                                </div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Pages -->



                    <!-- Blog -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Blog <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-full-width.html">Blog Full Width</a></li>
                            <li><a href="blog-grid.html">Blog 2 Columns</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                        </ul>
                    </li>

                    <!-- Shop -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Elements
                            <span class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="alerts.html">Alerts</a></li>
                        </ul>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
</section>





{{-- <!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    {{ __('Free shipping for standard order over $100') }}
                </div>

                <div class="right-top-bar flex-w h-full">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="flex-c-m trans-04 p-lr-25" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('admin/assets/img/logo.png') }}" alt="">
                    <img src="{{ asset('front/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="index.html">
                                {{ __('Categories') }}
                            </a>
                            <ul class="sub-menu">
                                <x-categories />
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('products.all') }}">
                                {{ __('Shop') }}
                            </a>
                        </li>

                        <li>
                            <a href="blog.html">
                                {{ __('Blog') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}">
                                {{ __('About') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}">
                                {{ __('Contact') }}
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="bi bi-search"></i>
                    </div>

                    @if (Auth::guard('web')->check())
                        <x-cart-menu />
                        <a href="#"
                            class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                            data-notify="0">
                            <i class="bi bi-heart"></i>
                        </a>
                    @endif
                    @if (Auth::guard('supplier')->check())
                        <x-notification />
                    @endif


                    <div class="menu-desktop">
                        <ul class="main-menu">
                            @if (!Auth::guard('supplier')->check() && !Auth::guard('web')->check())
                                <li class="active-menu">
                                    <a href="">{{ __('Sig In') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('user.login') }}">{{ __('User Sig In') }}</a></li>
                                        <li><a href="{{ route('supplier.login') }}">{{ __('supplier Sig In') }}</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="">
                                    <a href="">{{ __('Register') }}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('user.register') }}">{{ __('User Register') }}</a></li>
                                        <li><a
                                                href="{{ route('supplier.register') }}">{{ __('supplier Register') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                            @if (Auth::guard('supplier')->check())
                                <li class="active-menu">
                                    <img src="{{ Auth::guard('supplier')->user()->ImgSupplier }}" width="30"
                                        height="30" alt="Profile" class="rounded-circle">
                                    <a class="text-capitalize"> {{ Auth::guard('supplier')->user()->name }}</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a
                                                href="{{ route('supplier.profile', Auth::guard('supplier')->user()->slug) }}">
                                                <i class="bi bi-person"></i>
                                                {{ __('My Profile') }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('supplier.logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('supplier_logout').submit();">
                                                <i class="bi bi-box-arrow-right"></i>
                                                {{ __('Sign Out') }}
                                            </a>
                                        </li>
                                        <form action="{{ route('supplier.logout') }}" method="post"
                                            id="supplier_logout">
                                            @csrf
                                            @method('POST')
                                        </form>
                                    </ul>
                                </li>
                            @endif

                            @if (Auth::guard('web')->check())
                                <li class="active-menu">
                                    <img src="{{ Auth::guard('web')->user()->ImagUser }}" width="30" height="30"
                                        alt="Profile" class="rounded-circle">
                                    <a class="text-capitalize" href="">{{ Auth::guard('web')->user()->name }}</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ route('user.profile', Auth::guard('web')->user()->slug) }}">
                                                <i class="bi bi-person"></i>
                                                {{ __('My Profile') }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('user.logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('user_logout').submit();">
                                                <i class="bi bi-box-arrow-right"></i>
                                                {{ __('Sign Out') }}
                                            </a>
                                        </li>
                                        <form action="{{ route('user.logout') }}" method="post" id="user_logout">
                                            @csrf
                                            @method('POST')
                                        </form>
                                    </ul>
                                </li>
                            @endif



                        </ul>
                    </div>

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{ route('home') }}"><img src="{{ asset('front/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="bi bi-search"></i>
            </div>

            @if (Auth::guard('web')->check())
                <x-cart-menu />
                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                    data-notify="0">
                    <i class="bi bi-heart"></i>
                </a>
            @endif

            @if (Auth::guard('supplier')->check())
                <x-notification />
            @endif
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    {{ __('Free shipping for standard order over $100') }}
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="flex-c-m trans-04 p-lr-25" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li class="active-menu">
                <a href="index.html">
                    {{ __('Categories') }}
                </a>
                <x-categories />
            </li>

            <li>
                <a href="{{ route('products.all') }}">
                    {{ __('Shop') }}
                </a>
            </li>

            <li>
                <a href="blog.html">
                    {{ __('Blog') }}
                </a>
            </li>

            <li>
                <a href="{{ route('about') }}">
                    {{ __('About') }}
                </a>
            </li>

            <li>
                <a href="{{ route('contact') }}">
                    {{ __('Contact') }}
                </a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('front/images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="bi bi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header> --}}
