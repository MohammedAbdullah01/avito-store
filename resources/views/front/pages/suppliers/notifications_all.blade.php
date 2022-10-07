@extends('front.layouts.inc.header')
@section('title', 'Show Product')
@section('content')

    @include('front.layouts.inc.nav')

    <div class="container mt-3">
        <div class="row">

            {{-- Nav Profile --}}
            <div class="pagetitle">
                <h1>
                    {{ __('Notifications') }}
                </h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"> {{ __('Notifications All') }} </li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">

                <div class="card shadow-lg p-3 mb-5 bg-body rounded ">

                    <div class="row">
                        @forelse ($notifications as $notification)
                            <div class="col-sm-4">
                                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span class="float-end ">
                                                <i
                                                    class="{{ $notification->unread() ? 'bi bi-eye-slash-fill text-primary' : 'bi bi-eye-fill text-primary' }}"></i>
                                            </span>

                                            {{ 'New Order' }}
                                        </h5>
                                        <a href="{{ route('supplier.notification.show', $notification->id) }}"
                                            class="card-title">
                                            #{{ $notification->data['title'] }}
                                        </a>
                                    </div>
                                    <div class="card-footer text-center">
                                        <p class="card-text">
                                            <small class="text-muted">
                                                {{ $notification->created_at->diffForhumans() }}

                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger text-center w-50 m-auto ">
                                {{ __('No There Notification ') }} <i class="bi bi-emoji-frown-fill"></i></div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
