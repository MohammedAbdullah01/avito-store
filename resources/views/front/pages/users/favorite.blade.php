@extends('front.layouts.inc.header')
@section('title', 'My Favorite')
@section('content')

    @include('front.layouts.inc.nav')


    <x-breadcrumb pagetitle="My Favorite" lable="User" active="My Favorite" />

    <x-userProfile.page-wrapper-user />

    <section class="mt-3 mb-5" id="favorite">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media" style="overflow: inherit">
                            @include('front.layouts.inc.__products')
                            {{ $products->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
