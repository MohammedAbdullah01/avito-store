<!-- Cart -->
@if (Auth::guard('web')->check())

    <li class="dropdown cart-nav dropdown-slide">
        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                class="tf-ion-android-cart"></i>Cart</a>
        <div class="dropdown-menu cart-dropdown">
            <!-- Cart Item -->
            @forelse ($cart->getCart() as $item)
                <div class="media">
                    <a class="pull-left" href="#!">
                        <img class="media-object" src="{{ $item->product->mainPictureProduct }}" alt="image" />
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#!">Ladies Bag</a></h4>
                        <div class="cart-price">
                            <span>{{ $item->product_quantity }} x</span>
                            <span>
                                <x-currancy :amount="$item->product->purchase_price" />
                            </span>
                        </div>
                        <h5><strong></strong></h5>
                    </div>
                    <a href="{{ route('user.product.cart.delete', $item->id) }}" class="remove"
                        onclick="event.preventDefault(); document.getElementById('remove_product_cart{{ $item->id }}').submit();">
                        <i class="bi bi-x-circle-fill text-danger fs-5"></i>
                    </a>
                    <form action="{{ route('user.product.cart.delete', $item->id) }}" method="post"
                        id="remove_product_cart{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    {{-- <a href="#!" class="remove"><i class="tf-ion-close"></i></a> --}}
                </div>
            @empty
            @endforelse

            <div class="cart-summary">
                <span>Total</span>
                <span class="total-price">
                    <x-currancy :amount="$cart->totalCart()" />
                </span>
            </div>
            <ul class="text-center cart-buttons">
                <li><a href="{{ route('user.cart.index') }}" class="btn btn-small">View Cart</a></li>
                <li><a href="{{ route('user.checkout.create') }}" class="btn btn-small btn-solid-border">Checkout</a>
                </li>
            </ul>
        </div>

    </li>
@endif






{{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
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
                                {{ $item->product_quantity	 }} x
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
</div> --}}
