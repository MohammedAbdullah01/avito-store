@extends('front.layouts.inc.header')
@section('title', 'Checkout')
@section('content')

    @include('front.layouts.inc.nav')


    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <x-alert/>
                <div class="row">
                    <div class="col-md-8">
                        <div class="block billing-details">
                            <h4 class="widget-title">Billing Details</h4>
                            <form action="{{ route('user.checkout.store') }}" method="POST" class="checkout-form">
                                @csrf
                        @method('POST')
                                <x-form.input-error lable="Full Name" name="first_name" :value="$user->name" />

                                <x-form.input-error type="email" lable="Email" placeholder="you@example.com"
                                    name="email" :value="$user->email" />

                                <x-form.input-error type="email" lable="Email" placeholder="you@example.com"
                                    name="email" :value="$user->email" />

                                <x-form.input-error lable="Phone" placeholder="01234...." name="phone"
                                    :value="$user->phone" />

                                    <div class="form-group">
                                        <select class="form-control " name="country" required>
                                            @foreach ($countries as $code => $name)
                                                <option value="{{ $code }}"
                                                    @if ($code == old('country')) selected @endif>
                                                    {{ $name }}</option>
                                            @endforeach -->
                                            <option>United States</option>
                                        </select>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                <x-form.input-error lable="City" name="city" />

                                <x-form.input-error lable="Address" placeholder="1234 Main St" name="address"
                                    :value="$user->location" />

                                    <x-button value="Place Order" />
                            </form>
                        </div>
                        {{-- <div class="block">
                            <h4 class="widget-title">Payment Method</h4>
                            <p>Credit Cart Details (Secure payment)</p>
                            <div class="checkout-product-details">
                                <div class="payment">
                                    <div class="card-details">
                                        <form class="checkout-form">
                                            <div class="form-group">
                                                <label for="card-number">Card Number <span class="required">*</span></label>
                                                <input id="card-number" class="form-control" type="tel"
                                                    placeholder="•••• •••• •••• ••••">
                                            </div>
                                            <div class="form-group half-width padding-right">
                                                <label for="card-expiry">Expiry (MM/YY) <span
                                                        class="required">*</span></label>
                                                <input id="card-expiry" class="form-control" type="tel"
                                                    placeholder="MM / YY">
                                            </div>
                                            <div class="form-group half-width padding-left">
                                                <label for="card-cvc">Card Code <span class="required">*</span></label>
                                                <input id="card-cvc" class="form-control" type="tel" maxlength="4"
                                                    placeholder="CVC">
                                            </div>
                                            <a href="confirmation.html" class="btn btn-main mt-20">Place Order</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>


                    <div class="col-md-4">
                        <div class="product-checkout-details">
                            <div class="block">
                                <h4 class="widget-title">Order Summary</h4>
                                @foreach ($cart->getCart() as $item)
                                    <div class="media product-card">
                                        <a class="pull-left" href="product-single.html">
                                            <img class="media-object" src="{{ $item->product->mainPictureProduct }}"
                                                alt="Image" />
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="product-single.html">
                                                    {{ $item->product->title }}
                                                </a>
                                            </h4>

                                            <p class="price">{{ $item->product_quantity }} x
                                                <x-currancy :amount="$item->product->purchase_price" />
                                            </p>

                                            <a href="{{ route('user.product.cart.delete', $item->id) }}"
                                                class="remove text-danger"
                                                onclick="event.preventDefault(); document.getElementById('remove_product_cart{{ $item->id }}').submit();">
                                                {{ __('Remove') }}
                                            </a>
                                            <form action="{{ route('user.product.cart.delete', $item->id) }}"
                                                method="post" id="remove_product_cart{{ $item->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </div>
                                    </div>
                                @endforeach
                                <div class="discount-code">
                                    <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal"
                                            href="#!">enter it here</a>
                                    </p>
                                </div>
                                <ul class="summary-prices">
                                    <li>
                                        <span>Subtotal:</span>
                                        <span class="price">
                                            <x-currancy :amount="$cart->totalCart()" />
                                        </span>
                                    </li>
                                    <li>
                                        <span>Shipping:</span>
                                        <span>
                                            <x-currancy :amount="50" />
                                        </span>
                                    </li>
                                </ul>
                                <div class="summary-total">
                                    <span>Total</span>
                                    <span>
                                        <x-currancy :amount="$cart->totalCart() + 50" />
                                    </span>
                                </div>
                                <div class="verified-icon">
                                    <img src="images/shop/verified.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter Coupon Code">
                        </div>
                        <button type="submit" class="btn btn-main">Apply Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






    {{-- <section class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-6 order-md-1" style="margin-top: 90px">
                    <h4 class="mb-3">Billing address</h4>
                    <form action="{{ route('user.checkout.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">{{ __('Full name') }}</label>
                                <input type="text" class="form-control" name="first_name"
                                    value="{{ old('first_name', $user->name) }}" id="firstName" placeholder="" required>
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">{{ __('Email') }} <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" name="email"
                                value="{{ old('email', $user->email) }}" placeholder="you@example.com">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address">{{ __('Phone') }}</label>
                            <input type="text" class="form-control" name="phone"
                                value="{{ old('phone', $user->phone) }}" placeholder="1234 Main St" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address2">{{ __('Address') }} <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" name="address"
                                value="{{ old('address', $user->location) }}" placeholder="Apartment or suite">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="country">{{ __('Country') }}</label>
                            <select class="form-select " name="country" required>
                                <option value="">Choose...</option>
                                <!-- @foreach ($countries as $code => $name)
                                    <option value="{{ $code }}" @if ($code == old('country')) selected @endif>
                                        {{ $name }}</option>
                                @endforeach -->
                                <option>United States</option>
                            </select>
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="state">{{ __('City') }}</label>
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}"
                                placeholder="Apartment or suite">
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="post_alcode" value="{{ old('post_alcode') }}"
                                placeholder="" required>
                            @error('post_alcode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 col-4 mx-auto">
                            <button class="btn btn-outline-primary btn-block btn-sm" type="submit"
                                style="margin-bottom: 50px">
                                {{ __('Continue to checkout') }}
                            </button>
                        </div>
                    </form>
                </div>
                <hr class="mb-4">

                <div class="col-md-6 order-md-2 mb-4" style="margin-top: 90px">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">{{ __('Your Cart') }}</span>
                        <span class="badge badge-secondary badge-pill">{{ $cart->getCart()->count() }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach ($cart->getCart() as $item)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $item->product->title }} <strong> X
                                            {{ $item->quantity }}</strong></h6>
                                    <small class="text-muted"></small>

                                </div>
                                <span class="text-muted">
                                    <x-currancy :amount="$item->quantity * $item->product->purchase_price" />
                                </span>
                            </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">-$5</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>
                                <x-currancy :amount="$cart->totalCart()" />
                            </strong>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section> --}}
@endsection
