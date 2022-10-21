@extends('front.layouts.inc.header')
@section('title', 'My Orders')
@section('content')

    @include('front.layouts.inc.nav')


    <x-breadcrumb pagetitle="My Orders" lable="User" active="My Orders" />

    <x-userProfile.page-wrapper-user />

    <section class="section">
        <div class="container">
            <div class="col-md-12">
                <div class="dashboard-wrapper user-dashboard">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Order ID') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Items') }}</th>
                                    <th>{{ __('Total Price') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>#{{ $order->number }}</td>
                                        <td>{{ $order->created_at->diffForHumans() }}</td>
                                        <td>{{ $order->purchasedProducts()->sum('quantity') }}</td>
                                        <td>
                                            <x-currancy :amount="$order->total" />
                                        </td>
                                        <td>
                                            <span class="{{ $order->OrderStatus }}">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-default" data-toggle="modal"
                                                data-target="#order{{ $order->id }}">
                                                {{ __('View') }}
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="order{{ $order->id }}" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            @foreach ($order->orderitems as $item)
                                                                <div class="card mb-3" style="max-width: 540px;">
                                                                    <div class="row g-0">
                                                                        <div class="col-md-4">
                                                                            <img src="{{ $item->product->MainPictureProduct }}"
                                                                                class="img-fluid rounded-start"
                                                                                width="200px" alt="...">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">
                                                                                    {{ $item->product_name }}</h5>
                                                                                <ul class="list-group list-group-flush">

                                                                                    <li class="list-group-item small">Price
                                                                                        <span class="float-end text-muted">
                                                                                            <x-currancy :amount="$item->price" />
                                                                                        </span>
                                                                                    </li>

                                                                                    <li class="list-group-item small">Size
                                                                                        <span
                                                                                            class="float-end text-muted">{{ $item->size }}</span>
                                                                                    </li>

                                                                                    <li class="list-group-item small">Color
                                                                                        <span
                                                                                            class="float-end text-muted">{{ $item->color }}</span>
                                                                                    </li>

                                                                                    <li class="list-group-item small">
                                                                                        Quantity
                                                                                        <span
                                                                                            class="float-end text-muted">{{ $item->quantity }}</span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-warning alert-common text-center">
                                                <i class="bi bi-exclamation-triangle-fill"></i>

                                                {{ __('There Are No Orders') }}

                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
