<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
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
</div>
