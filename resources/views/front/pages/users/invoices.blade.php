@extends('front.layouts.inc.header')
@section('title', 'My Invoices')
@section('content')

    @include('front.layouts.inc.nav')


    <x-breadcrumb pagetitle="My Invoices" lable="User" active="My Invoices" />

    <x-userProfile.page-wrapper-user />

    <section class="section">
        <div class="container">
            @forelse ($orders as $order)
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center mt-2">
                                <img src="{{ asset('frontEnd/images/logo.png') }}" alt="">
                            </div>
                            <hr>
                            <p class="card-text">
                                {{ __('Invoice Number') }}
                                <span class="float-end">#{{ $order->number }}</span>
                            </p>
                            <p class="card-text">
                                {{ __('Customer Name') }}
                                <span class="float-end">{{ $order->user->UserName }}</span>
                            </p>
                            <p class="card-text">
                                {{ __('Invoice Date') }}
                                <span class="float-end">{{ $order->created_at }}</span>
                            </p>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item small ">
                                    <h4 class="card-title text-center text-primary">
                                        {{ __('Shipping Details') }}
                                    </h4>
                                </li>

                                <li class="list-group-item small">Order Recipient Name
                                    <span class="float-end text-muted">
                                        {{ $order->shippingAddress->UserName }}
                                    </span>
                                </li>

                                <li class="list-group-item small">Number Mobile
                                    <span class="float-end text-muted">{{ $order->shippingAddress->phone }}</span>
                                </li>

                                <li class="list-group-item small">Name City
                                    <span class="float-end text-muted">{{ $order->shippingAddress->city }}</span>
                                </li>

                                <li class="list-group-item small">Address
                                    <span class="float-end text-muted">{{ $order->shippingAddress->Address }}</span>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item small ">
                                    <h4 class="card-title text-center text-primary">
                                        {{ __('Order Details') }}
                                    </h4>
                                </li>

                                @foreach ($order->purchasedProducts as $item)
                                    <li class="list-group-item small">
                                        {{ $item->product_name }}
                                        <span class="float-end text-muted">
                                            {{ $item->quantity }} X
                                            <x-currancy :amount="$item->price" />
                                        </span>
                                        <p style="font-size: 13px">

                                            <span class="card-text">Size :
                                                {{ $item->size }} </span>&comma;
                                            <span class="text-muted">Color :
                                                {{ $item->color }}</span>
                                        </p>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            <li class="list-group-item small">SubTotal
                                <span class="float-end text-muted">
                                    <x-currancy :amount="$order->total" />
                                </span>
                            </li>

                            <li class="list-group-item small">Shipping
                                <span class="float-end text-muted">
                                    <x-currancy :amount="50" />
                                </span>
                            </li>

                            <li class="list-group-item small">Total
                                <span class="float-end text-muted">
                                    <x-currancy :amount="$order->total + 50" />
                                </span>
                            </li>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning alert-common text-center ">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{ __('There Are No Invoices') }}

                </div>
            @endforelse
        </div>

    </section>

@endsection
