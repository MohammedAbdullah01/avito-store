@extends('front.layouts.inc.header')
@section('title', 'My Invoices')
@section('content')

    @include('front.layouts.inc.nav')


    <x-breadcrumb pagetitle="My Invoices" lable="User" active="My Invoices" />

    <x-userProfile.page-wrapper-user />

    <section class="mt-3">
        <div class="container">
            <div class="col-md-12 mb-5">
                <div class="dashboard-wrapper user-dashboard">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    @forelse ($orders as $order)
                                        <h4 class="card-title ">Invoice Number :
                                            {{ $order->number }}</h4>
                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item small">Customer Name
                                                <span class="float-end text-muted">
                                                    {{ $order->user->UserName }}
                                                </span>
                                            </li>
                                        </ul>

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
                                                <span
                                                    class="float-end text-muted">{{ $order->shippingAddress->phone }}</span>
                                            </li>

                                            <li class="list-group-item small">Name City
                                                <span
                                                    class="float-end text-muted">{{ $order->shippingAddress->city }}</span>
                                            </li>

                                            <li class="list-group-item small">Address
                                                <p class="card-text" style="font-size: 13px">
                                                    {{ $order->shippingAddress->address }}</p>
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
                                                    <p style="font-size: 10px">

                                                        <span class="text-muted m-2">Size :
                                                            {{ $item->size }} </span>&comma;
                                                        <span class="text-muted">Color :
                                                            {{ $item->color }}</span>
                                                    </p>
                                                </li>
                                            @endforeach

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
                                        </ul>
                                    @empty

                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
