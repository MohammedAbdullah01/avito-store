@extends('admin.layouts.app')
@section('title', 'Orders')
@section('content')

    @include('admin.layouts.inc.header')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Latest Orders') }}</h1>
            <nav>
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Table') }}</li>
                    <li class="breadcrumb-item ">{{ __('Orders') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="col-12">
                <div class="card text-bg-dark mb-3  ">

                    <div class="card-body">
                        <div class="row">
                            @forelse ($orders as $order)
                                <div class="col-lg-4">
                                    <div class="card">
                                        <h5 class="card-header">#{{ $order->number }}
                                            @include('front.pages.users.modal.details_order')
                                        </h5>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $order->first_name }}</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    {{ __('Payment Status') }}
                                                    <span class="float-end {{ $order->OrderPyamentStatus }}">
                                                        {{ $order->payment_status }}
                                                    </span>
                                                </li>
                                                <li class="list-group-item">
                                                    {{ __('Order Status') }}
                                                    <span class="float-end {{ $order->OrderStatus }}">

                                                        {{ $order->status }}
                                                    </span>

                                                </li>
                                                <li class="list-group-item">
                                                    {{ __('Phone') }}
                                                    <span class="float-end badge bg-light text-dark">
                                                        {{ $order->phone }}

                                                    </span>

                                                </li>
                                                <li class="list-group-item">
                                                    {{ __('City') }}
                                                    <span class="float-end badge bg-light text-dark">
                                                        {{ $order->city }}
                                                    </span>

                                                </li>
                                                <li class="list-group-item">Address
                                                    <p class="card-text">
                                                        <span class="float-end badge bg-light text-dark">
                                                            {{ $order->address }}
                                                        </span>
                                                    </p>
                                                </li>
                                                <li class="list-group-item">
                                                    Total
                                                    <span class="float-end badge bg-light text-dark">
                                                        <x-currancy :amount="$order->total" />
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card-footer text-muted">
                                            <i class="bi bi-clock-fill"></i>
                                            {{ $order->created_at->format('d-M-Y h:i A') }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <td colspan="10">
                                    <div class="alert alert-danger text-center mt-4 ">
                                        <b>
                                            {{ __('There Are No Orders') }}
                                            <i class="bi bi-emoji-frown-fill"></i>
                                        </b>
                                    </div>
                                </td>
                            @endforelse
                        </div>
                    </div>

                </div>
                {{ $orders->links() }}
            </div>
        </section>

    </main>
@endsection
