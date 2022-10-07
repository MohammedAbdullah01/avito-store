<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="" />
            <span class="d-none d-lg-block">Coza Store</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
            <button type="submit" title="Search">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <li class="nav-item dropdown">

                <x-admin-notification />

            </li>

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have 3 new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Auth::guard('admin')->user()->ImgAdmin }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::guard('admin')->user()->name }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit" class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>
</header>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        <!-- End Li Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.category.index') }}">
                <i class="bi bi-bookmarks-fill"></i>
                <span> {{ __('Categories') }} </span>
            </a>
        </li>
        <!-- End Li Categories Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.product.index') }}">
                <i class="bi bi-bookmark-check-fill"></i>
                <span> {{ __('Products') }} </span>
            </a>
        </li>
        <!-- End Products Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.products.inactivate')}}">
                <i class="bi bi-bookmark-dash-fill"></i>
                <span> {{ __('Inactive Products') }} </span>
            </a>
        </li>
        <!-- End Products Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-person-rolodex"></i>
                <span> {{ __('Contact') }} </span>
            </a>
        </li><!-- End Li Contact Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.comment.index') }}">
                <i class="bi bi-chat-right-text-fill"></i>
                <span> {{ __('Comments') }} </span>
            </a>
        </li>
        <!-- End Li Comments Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.supplier.index') }}">
                <i class="bi bi-person-badge-fill"></i>
                <span> {{ __('Suppliers') }}</span>
            </a>
        </li>
        <!-- End Li Suppliers Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.supplier.isActivate') }}">
                <i class="bi bi-person-dash-fill"></i>
                <span> {{ __('Inactive suppliers') }} </span>
            </a>
        </li>
        <!-- End Li Inactive suppliers Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.users.index') }}">
                <i class="bi bi-person-fill"></i>
                <span> {{ __('Users') }} </span>
            </a>
        </li><!-- End Li Users Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.orders.index') }}">
                <i class="bi bi-list-ol"></i>
                <span> {{ __('Orders') }} </span>
            </a>
        </li>
        <!-- End Li Orders Nav -->

    </ul>

</aside><!-- End Sidebar-->
