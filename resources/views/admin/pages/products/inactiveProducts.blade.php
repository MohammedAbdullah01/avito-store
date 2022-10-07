@extends('admin.layouts.app')
@section('title', 'Inactive Products')

@section('content')

    @include('admin.layouts.inc.header')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Inactive Products') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Table') }}</li>
                    <li class="breadcrumb-item active">{{ __('Inactive Products') }}</li>
                </ol>
            </nav>
        </div>

        <x-alert />

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card-body">

                        <table class="table table-dark table-hover ">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Main photo') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                    <th scope="col">{{ __('Quantity') }}</th>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Supplier') }}</th>
                                    <th scope="col">{{ __('Admin') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inactiveProducts as $product)
                                    <tr>
                                        <td class="text-center">{{ $product->id }}</td>
                                        <td class="text-center">
                                            <img class="rounded-circle" src=" {{ $product->mainPictureProduct }} "
                                                alt="{{ $product->main_picture }}" width="60px" height="60px">
                                        </td>
                                        <td class="text-center">{{ $product->title }}</td>
                                        <td class="text-center">{{ Str::limit($product->description, 20, '...') }}</td>
                                        <td class="text-center">
                                            @if ($product->sale_price)
                                                <x-currancy :amount="$product->sale_price" />/
                                                <del>
                                                    <x-currancy :amount="$product->price" />
                                                </del>
                                            @else
                                                <x-currancy :amount="$product->price" />
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $product->quantity }}</td>
                                        <td class="text-center">{{ $product->category->name }}</td>
                                        <td class="text-center">{{ $product->supplier->name }}</td>
                                        <td class="text-center">{{ $product->admin->name }}</td>
                                        <td>
                                            @include('admin.pages.products.modal.active')
                                            {{-- End Modal Active product --}}
                                        </td>

                                    @empty
                                        <td colspan="10">
                                            <div class="alert alert-danger text-center ">
                                                <b>
                                                    {{ __('No Inactive Products ') }}
                                                    <i class="bi bi-emoji-frown-fill"></i>
                                                </b>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
