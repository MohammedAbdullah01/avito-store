{{-- <nav class="header-nav ms-auto"> --}}
{{-- <ul class="d-flex align-items-center">

    <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                    <h4>Lorem Ipsum</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>30 min. ago</p>
                </div>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                    <h4>Atque rerum nesciunt</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>1 hr. ago</p>
                </div>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                    <h4>Sit rerum fuga</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>2 hrs. ago</p>
                </div>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                    <h4>Dicta reprehenderit</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>4 hrs. ago</p>
                </div>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
            </li>

        </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

</ul> --}}
{{-- </nav> --}}













{{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
    data-notify="{{ $unredcount }}">
    <i class="bi bi-bell"></i>
</div>


<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2" style="font-size:13px">
                New Unread Notifications {{ $unredcount }}
            </span>
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="bi bi-x-octagon-fill"></i>
            </div>

        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @forelse ($notifications as $notification)
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ asset('storage/products/' . $notification->data['icon']) }}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="{{ route('supplier.notification.show', $notification->id) }}"
                                class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                #{{ $notification->data['title'] }}
                                <i
                                    class="{{ $notification->unread() ? 'bi bi-eye-slash-fill text-primary' : 'bi bi-eye-fill text-primary' }}"></i>
                            </a>


                            <span class="header-cart-item-info">
                                {{ $notification->data['body'] }}
                            </span>
                            <span class="header-cart-item-info">
                                {{ $notification->data['quantity'] }}
                            </span>
                            <span class="header-cart-item-info">
                                {{ $notification->created_at->diffForhumans() }}
                            </span>
                        </div>
                    </li>
                @empty
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04 text-danger">
                            {{ __('No There Notification ') }} <i class="bi bi-emoji-frown-fill"></i>
                        </a>
                    </li>
                @endforelse
            </ul>

            <div class="w-full">

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{ route('supplier.notifications.all') }}"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Show All Notifications
                    </a>
                </div>
            </div>
        </div>

    </div>
</div> --}}



<li class="dropdown search dropdown-slide">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        @if ($unreadCount)
            <span class="badge bg-danger badge-number" style="position: relative; bottom: 12px; right: 18px;">
                {{ $unreadCount }}
            </span>
        @endif
    </a><!-- End Notification Icon -->
    <ul class="dropdown-menu search-dropdown" style="left: 55px; right:unset; top: 60%; margin: 6px; width: 68%;">
        @forelse ($notifications as $notification)
            <div class="media" @if ($notification->unread()) style="background-color: #eaf1f7" @endif>
                <a class="pull-left" href="#!">
                    <i class="{{ $notification->data['icon'] }}"></i>
                    {{-- --}}
                </a>
                <div class="media-body">
                    <a href="{{route('home')}}?notification_id={{$notification->id}}">
                        <h5 class="media-heading">
                            {{ $notification->data['title'] }}
                        </h5>
                        <div class="cart-price text-secondary">
                            <span>{{ $notification->data['body'] }}</span>
                        </div>
                        <h5>
                            {{ $notification->created_at->longAbsoluteDiffForHumans() }}
                        </h5>
                    </a>
                </div>
                <hr style="margin-top: 0px;margin-bottom: 0px;border-top: 3px solid #eee">

            </div>
        @empty
            <div class="media">
                <div class="media-body text-center">
                    <h5>
                        <strong>
                            {{ __('No There Notifications') }}
                            <i class="bi bi-emoji-frown"></i>
                        </strong>
                    </h5>
                </div>

            </div>
        @endforelse
        <li><a href="{{ route('user.cart.index') }}" class="btn btn-primary ">Show Notifications All</a></li>
</li>


</ul>
</li>
