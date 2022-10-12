@props([
    'supplier' => '',
])

<section class="mt-4 mb-4">
    <div class="container">
        <x-alert />
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline dashboard-menu text-center">
                    <li><a href="{{ route('supplier.profile', $supplier->slug) }}">
                            <i class="bi bi-person-square"></i>
                            {{ __('Profile Details') }}
                        </a>
                    </li>
                    <li><a href="#product">
                            <i class="bi bi-bag-fill"></i>
                            {{ __('Products') }}
                        </a>
                    </li>


                    @if (Auth::guard('supplier')->check())
                        @if ($supplier->id == Auth::guard('supplier')->user()->id)
                            <li><a href="order.html">
                                    <i class="bi bi-list-ol"></i>
                                    {{ __('Orders') }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('supplier.edit.profile', $supplier->slug) }}">
                                    <i class="bi bi-pencil-square"></i>
                                    {{ __('Edit Profile') }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('supplier.edit.password', $supplier->slug) }}">
                                    <i class="bi bi-unlock-fill"></i>
                                    {{ __('Change Password') }}
                                </a>
                            </li>

                            <li><a href="dashboard.html">
                                    <i class="bi bi-speedometer"></i>
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        @endif
                    @endif


                </ul>
            </div>
        </div>
    </div>
</section>
