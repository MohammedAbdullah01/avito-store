@extends('admin.layouts.app')
@section('title', 'tags')
@section('content')

    @include('admin.layouts.inc.header')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ __('tags') }}</h1>
            <nav>
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Table') }}</li>
                    <li class="breadcrumb-item ">{{ __('tag') }}</li>
                </ol>
            </nav>
        </div>

        @include('admin.pages.tags.modal.create')

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <table class="table table-dark table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Products Count') }}</th>
                                <th scope="col">{{ __('Created At') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <th>{{ $tag->id }}</th>
                                    <td>{{ $tag->slug }}</td>
                                    <td>{{ $tag->products_count }}</td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">

                                            {{-- Button Trigger Modal Edit --}}
                                            @include('admin.pages.tags.modal.edit')
                                            {{-- End Modal Edit taggorie --}}

                                            {{-- Button Trigger Modal Delete --}}
                                            @include('admin.pages.tags.modal.delete')
                                            {{-- End Modal Delete taggorie --}}
                                        </div>
                                    </td>
                                @empty
                                    <td colspan="10" class="text-center text-danger ">
                                        <b>
                                            {{ __('There Are No tags !') }}
                                        </b>
                                    </td>

                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </section>

    </main>
@endsection
