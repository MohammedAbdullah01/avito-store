@extends('admin.layouts.app')
@section('title', 'Categories')
@section('content')

    @include('admin.layouts.inc.header')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Comments') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Table') }}</li>
                    <li class="breadcrumb-item active">{{ __('Comments') }}</li>
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
                                        {{ __('Comment') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('User') }}
                                    </th>
                                    <th scope="col">
                                        {{ __('Product') }}
                                    </th>
                                    <th scope="col" class="text-center">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td> {{ Str::limit($comment->body, 30, '...') }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->product->title }}</td>
                                        <td>
                                            @include('admin.pages.comments.modal.delete')
                                            {{-- End Modal Edit comment --}}
                                        </td>
                                    @empty
                                        <td colspan="10">
                                            <div class="alert alert-danger text-center ">
                                                <b>
                                                    {{ __('There Are No Comments') }}
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
