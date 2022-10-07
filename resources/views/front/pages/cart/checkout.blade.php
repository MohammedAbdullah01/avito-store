@extends('front.layouts.inc.header')
@section('title', 'Checkout')
@section('content')

    @include('front.layouts.inc.nav')

    <section class="section">
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
                                @foreach ($countries as $code => $name)
                                    <option value="{{ $code }}" @if ($code == old('country')) selected @endif>
                                        {{ $name }}</option>
                                @endforeach
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
                        <span class="badge badge-secondary badge-pill">{{ $cart->all()->count() }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach ($cart->all() as $item)
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
                                <x-currancy :amount="$cart->total()" />
                            </strong>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
@endsection
