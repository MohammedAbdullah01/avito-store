@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')

    @include('admin.layouts.inc.header')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Users') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Table') }}</li>
                    <li class="breadcrumb-item active">{{ __('Users') }}</li>
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
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Main photo') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Gander') }}</th>
                                    <th scope="col">{{ __('Phone') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            <img class="rounded-circle" src=" {{ $user->ImagUser }}" width="60px"
                                                height="60px" alt=" {{ $user->avatar }}">
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->gander }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-info btn-sm"
                                                href={{ route('user.profile', $user->slug) }}>
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            @include('admin.pages.users.modal.delete')
                                        </td>
                                    @empty
                                        <td colspan="10">
                                            <div class="alert alert-danger text-center ">
                                                <b>
                                                    {{ __('There Are No Users') }}
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
