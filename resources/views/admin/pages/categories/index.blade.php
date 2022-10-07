@extends('admin.layouts.app')
@section('title', 'Categories')
@section('content')

    @include('admin.layouts.inc.header')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('Categories') }}</h1>
            <nav>
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Table') }}</li>
                    <li class="breadcrumb-item ">{{ __('Categories') }}</li>
                </ol>
            </nav>
        </div>

        <x-alert />

        @include('admin.pages.categories.modal.create')

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <table class="table table-dark table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Avatar') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Products Count') }}</th>
                                <th scope="col">{{ __('Created At') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $cate)
                                <tr>
                                    <th>{{ $cate->id }}</th>
                                    <th>
                                        <img class="rounded-circle" src=" {{ $cate->AvatarCategory }}" width="60px"
                                            height="60px" alt=" {{ $cate->avatar }}">
                                    </th>
                                    <td>{{ $cate->slug }}</td>
                                    <td>{{ Str::limit($cate->description, 20, '...') }}</td>
                                    <td>{{ $cate->products_count }}</td>
                                    <td>{{ $cate->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">

                                            {{-- Button Trigger Modal Edit --}}
                                            @include('admin.pages.categories.modal.show')
                                            {{-- End Modal Edit Categorie --}}

                                            {{-- Button Trigger Modal Edit --}}
                                            @include('admin.pages.categories.modal.edit')
                                            {{-- End Modal Edit Categorie --}}

                                            {{-- Button Trigger Modal Delete --}}
                                            @include('admin.pages.categories.modal.delete')
                                            {{-- End Modal Delete Categorie --}}
                                        </div>
                                    </td>
                                @empty
                                    <td colspan="10">
                                        <div class="alert alert-danger text-center ">
                                            <b>
                                                {{ __('There Are No Categories') }}
                                                <i class="bi bi-emoji-frown-fill"></i>
                                            </b>
                                        </div>
                                    </td>

                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
            </div>
        </section>

    </main>
@endsection
