@extends('front.layouts.inc.header')
@section('title', 'Home')
@section('content')

    @include('front.layouts.inc.nav')

    <div class="bg0 p-t-75 p-b-85">
        <div class="container">

            <div class="pagetitle">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="bi bi-house-door"></i><a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Cart All') }}</li>
                    </ol>
                    @if ($subtotal > 0)
                        <form action="{{ route('user.cart.destroy') }}" method="post">
                            @csrf
                            @method('DELETE')

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-outline-danger btn-sm "
                                    type="submit">{{ __('Completely Delete Your Cart ') }}</button>
                            </div>
                        </form>
                    @endif
                </nav>
            </div>

            <div class="row">
                <div class="col-md-12  m-lr-auto m-b-50">

                    <table class="table table-hover">
                        <thead class="table-dark mb-5">
                            <tr>
                                <th>Remove</th>
                                <th scope="col">image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Size</th>
                                <th scope="col">Color</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                                <tr>
                                    <th>
                                        <form action="{{ route('user.product.cart.destroy', $cart->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-outline-danger btn-sm" type="submit">
                                                <i class=" bi bi-x-circle "></i>
                                            </button>

                                        </form>
                                    </th>
                                    <td>
                                        <div class="how-itemcart1">
                                            <img src="{{ $cart->product->mainPictureProduct }}" alt="IMG">

                                        </div>
                                    </td>
                                    <td>{{ $cart->product->title }}</td>
                                    <td>{{ $cart->size }}</td>
                                    <td>{{ $cart->color }}</td>
                                    <td>
                                        <x-currancy :amount="$cart->product->purchaseprice" />
                                    </td>
                                    <td class="text-center">{{ $cart->quantity }}</td>
                                    <td>
                                        <x-currancy :amount="$cart->quantity * $cart->product->purchaseprice" />
                                    </td>
                                </tr>
                            @empty
                                <th colspan="7">
                                    <div class="alert alert-danger m-auto w-50 text-center">
                                        {{ __('There Are No Products In The Cart ') }} <i
                                            class="bi bi-emoji-frown-fill"></i>
                                    </div>
                                </th>
                            @endforelse

                            @if ($subtotal > 0)
                                <tr class="table-secondary">
                                    <td colspan="7"><b> Total:</b></td>
                                    <td>
                                        <b>
                                            <x-currancy :amount="$subtotal" />
                                        </b>
                                    </td>
                                </tr>
                            @endif
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
