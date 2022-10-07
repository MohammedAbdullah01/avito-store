@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('navbar')
    @include('admin.layouts.inc.header')
@endsection

@section('content')

    <main id="main" class="main">

        <!-- Start Page Title -->
        <div class="pagetitle">
            <h1>{{ __('Dashboard') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Count Users -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Users') }} </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_users }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Count Users -->

                        <!-- Count Suppliers -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Suppliers') }} </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-check-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_suppliers }}</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Count Suppliers-->

                        <!-- Count Suppliers Not Active -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Suppliers Not Active') }}
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-dash-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_suppliers_notactiv }}</h6>
                                            <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">decrease</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Count Suppliers Not Active -->

                        <!-- Count Categories -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Categories') }} </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bookmarks-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_categories }}</h6>
                                            <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">decrease</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Count Categories -->

                        <!-- Count Products-->
                        <div class="col-xxl-3 col-xl-12">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Products') }} </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-receipt"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_products }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Count Products -->

                        <!-- Count Products Not Active -->
                        <div class="col-xxl-3 col-xl-12">
                            <div class="card info-card customers-card ">

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Products Not Active') }}
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_products_notactiv }}</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Products Not Active -->

                        <!-- Count Comments-->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Comments') }} </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-chat-right-text-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $count_comments }}</h6>
                                            <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">decrease</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Count Comments-->

                        <!-- Count Tags -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">{{ __('Tags') }} </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-tags-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6></h6>
                                            <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">decrease</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Count Tags-->

                        <!-- Reports Chart -->
                        <div class="col-md-8">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="card-title">Website Traffic </h5>

                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <canvas id="myChart" width="600" height="285"></canvas>
                                    <script>
                                        const ctx = document.getElementById('myChart').getContext('2d');
                                        fetch("{{ route('admin.chart.order') }}")
                                            .then(response => response.json())
                                            .then(json => {
                                                const myChart = new Chart(ctx, {
                                                    type: 'bar',
                                                    data: {
                                                        labels: json.labels,
                                                        datasets: json.datasets
                                                    },
                                                    options: {
                                                        scales: {
                                                            y: {
                                                                beginAtZero: true
                                                            }
                                                        }
                                                    }
                                                });
                                            })
                                    </script>

                                </div>

                            </div>
                        </div><!-- End Reports Chart -->

                        <!-- News Updates -->
                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">The Latest Products Are Not Activated</h5>

                                    <div class="news">
                                        @forelse ($products_Not_Activate as $product)
                                            <div class="post-item clearfix mb-2">
                                                <img src="{{ $product->mainPictureProduct }}" height="100"
                                                    alt="">
                                                <h4><a href="">{{ $product->title }}</a></h4>
                                                <p>{{ $product->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        @empty
                                            <div class="post-item clearfix mb-2">
                                                <h4 class="text-danger">{{ __('There are no non-active products ') }}
                                                </h4>
                                                </p>
                                            </div>
                                        @endforelse
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End News Updates-->

                        <!-- Latest Users -->
                        <div class="col-sm-12 col-lg-6 ">
                            <div class="card top-selling">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">{{ __('Latest Users') }} </h5>

                                    <div class="container">
                                        <div class="row">
                                            @forelse ($all_users as $user)
                                                <div class="col-6 col-lg-4">
                                                    <div class="card text-center" style="width: 12rem;">
                                                        <div class="text-center mt-1">
                                                            <img src="{{ $user->ImagUser }}" class="rounded-5 "
                                                                style="height: 75px; width: 75px;">
                                                        </div>
                                                        <div class="card-body">
                                                            <b class="text-primary">{{ $user->name }}</b>
                                                            <p class="card-text">
                                                                {{ $user->created_at->diffForhumans() }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-danger text-center ">
                                                    <b>{{ __('There are no clients at the moment !') }}</b>
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Table Top Sale  -->

                        <!-- Latest Suppliers In Not Active -->
                        <div class="col-sm-12 col-lg-6 ">
                            <div class="card top-selling">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">{{ __('Latest Suppliers Are Inactive') }}</h5>

                                    <div class="container">
                                        <div class="row">
                                            @forelse ($all_suppliers as $supplier)
                                                <div class="col-6 col-lg-4">
                                                    <div class="card text-center" style="width: 12rem;">
                                                        <div class="text-center mt-1">
                                                            <img src="{{ $supplier->ImgSupplier }}" class="rounded-5 "
                                                                style="height: 75px; width: 75px;">
                                                        </div>
                                                        <div class="card-body">
                                                            <b class="text-primary">{{ $supplier->name }}</b>
                                                            <p class="card-text">
                                                                {{ $supplier->created_at->diffForhumans() }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="alert alert-danger text-center ">
                                                    <b>{{ __('There are no suppliers at the moment !') }}</b>
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- End Latest Suppliers In Not Active  -->

                        <!-- Top Selling -->
                        <div class="col-md-12">
                            <div class="card top-selling">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top Selling </h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Preview</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Sold</th>
                                                <th scope="col">Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($top_product as $item)
                                                <tr>
                                                    <th scope="row">
                                                        <a href="#"><img
                                                                src="{{ $item->product->mainPictureProduct }}"
                                                                alt="" /></a>
                                                    </th>
                                                    <td>
                                                        <a href="#"
                                                            class="text-primary fw-bold">{{ $item->product->title }}</a>
                                                    </td>
                                                    <td>
                                                        <x-currancy :amount="$item->price" />
                                                    </td>
                                                    <td class="fw-bold">{{ $item->sales }}</td>
                                                    <td>
                                                        <x-currancy :amount="$item->price * $item->sales" />
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="9">
                                                    <div class="alert alert-danger text-center m-auto w-50">
                                                        {{ __('Best Selling Products Not Found ') }} <i
                                                            class="bi bi-emoji-frown-fill"></i>
                                                    </div>
                                                </td>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Top Selling -->

                        <!-- Orders -->
                        <div class="col-12">
                            <div class="card recent-sales">

                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="card-title">{{ __('Latest Orders') }} </h5>
                                        @forelse ($all_orders as $order)
                                            <div class="col-sm-12 col-md-3">
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
                                            <div class="alert alert-danger text-center m-auto w-50">
                                                {{ __('No There Orders ') }}
                                                <i class="bi bi-emoji-frown-fill"></i>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Orders -->

                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
