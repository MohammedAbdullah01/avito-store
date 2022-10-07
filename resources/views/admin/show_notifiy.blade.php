@extends('admin.layouts.app')
@section('title', 'Notification')
@section('content')

    @include('admin.layouts.inc.header')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Notification') }}</h1>
            <nav>
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Notification') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-8 col-sm-12 m-auto">
                    <div class="card shadow-lg p-3 bg-body rounded  ">
                        <div class="row ">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/products/' . $notification->data['icon']) }}"
                                    class="img-thumbnail" style="height: 250px"alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-header">
                                    #{{ $notification->data['title'] }}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $notification->data['body'] }}</h5>
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item">
                                            <h6 class="text-primary">{{ __('Quantity ') }}

                                                <span class="float-end badge bg-info text-dark">
                                                    {{ $notification->data['quantity'] }}
                                                </span>
                                            </h6>
                                        </li>
                                        <li class="list-group-item">
                                            <h6 class="text-primary">{{ __('price ') }}

                                                <span class="float-end badge bg-info text-dark">
                                                    <x-currancy :amount="$notification->data['price']" />
                                                </span>
                                            </h6>

                                        </li>

                                        <li class="list-group-item">
                                            <h6 class="text-primary">{{ __('color') }}
                                                <span class="float-end badge bg-info text-dark">
                                                    {{ $notification->data['color'] }}
                                                </span>
                                            </h6>
                                        </li>

                                        <li class="list-group-item ">
                                            <h6 class="text-primary">{{ __('size') }}
                                                <span class="float-end badge bg-info text-dark">
                                                    {{ $notification->data['size'] }}
                                                </span>
                                            </h6>
                                        </li>
                                    </ul>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            {{ $notification->created_at->diffForhumans() }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
