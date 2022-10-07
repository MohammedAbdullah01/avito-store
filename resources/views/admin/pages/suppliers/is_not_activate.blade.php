@extends('admin.layouts.app')
@section('title', 'Activate Suppliers')
@section('content')

    @include('admin.layouts.inc.header')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Activate Suppliers') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Table') }}</li>
                    <li class="breadcrumb-item active">{{ __('Activate Suppliers') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card-body">

                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        {{ __('ID') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('Main photo') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('Name') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('Email') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('Phone') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('Gander') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('Status') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliers as $supplier)
                                    <tr>
                                        <td>
                                            {{ $supplier->id }}
                                        </td>
                                        <td>
                                            <img class="rounded-circle" src=" {{ $supplier->ImgSupplier }} " width="60px"
                                                height="60px" alt=" {{ $supplier->avatar }}">
                                        </td>
                                        <td>
                                            {{ $supplier->name }}
                                        </td>
                                        <td>
                                            {{ $supplier->email }}
                                        </td>
                                        <td>
                                            {{ $supplier->phone }}
                                        </td>
                                        <td>
                                            {{ $supplier->gander }}
                                        </td>
                                        <td>
                                            @if ($supplier->status == 0)
                                                <span class="badge rounded-pill bg-danger">Not Enabled</span>
                                            @endif
                                        </td>
                                        <td>

                                            @include('admin.pages.suppliers.modal.activate')
                                        </td>
                                    @empty

                                        <td colspan="10">
                                            <div class="alert alert-danger text-center ">
                                                <b>
                                                    {{ __('There Are No Unapproved Suppliers') }}
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
