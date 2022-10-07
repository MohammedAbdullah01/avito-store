<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
    data-notify="{{ $cart->all()->count() }}">
    <i class="bi bi-cart4"></i>
</div>


<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="bi bi-x-octagon-fill"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @forelse ($cart->all() as $item)
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ $item->product->mainPictureProduct }}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{ $item->product->title }}
                            </a>

                            <span class="header-cart-item-info">
                                {{ $item->quantity }} x
                                <x-currancy :amount="$item->product->purchase_price" />
                            </span>
                        </div>
                    </li>
                @empty
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04 text-danger">
                            {{ __('The Cart Of Products Is Empty ') }} <i class="bi bi-emoji-frown-fill"></i>
                        </a>
                    </li>
                @endforelse
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total:
                    <x-currancy :amount="$cart->total()" />
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{ route('user.cart.index') }}"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>
                    @if ($cart->all()->count() > 0)
                        <a href="{{ route('user.checkout.create') }}"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            {{ __('Check Out') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>