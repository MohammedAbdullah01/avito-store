

<section class="mt-4 mb-4">
    <div class="container">
        <x-alert />
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline dashboard-menu text-center">
                    <li><a href="{{ route('user.profile', Auth::guard('web')->user()->slug) }}">
                            <i class="bi bi-person-square"></i>
                            {{ __('Profile Details') }}
                        </a>
                    </li>
                    <li><a href="#favorite">
                            <i class="bi bi-bag-fill"></i>
                            {{ __('Favorite') }}
                        </a>
                    </li>


                    <li><a href="{{ route('user.orders' , Auth::guard('web')->user()->slug) }}">
                            <i class="bi bi-list-ol"></i>
                            {{ __('Orders') }}
                        </a>
                    </li>

                    <li><a href="{{ route('user.invoices' , Auth::guard('web')->user()->slug) }}">
                            <i class="bi bi-list-ol"></i>
                            {{ __('Invoices') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.edit.profile', Auth::guard('web')->user()->slug) }}">
                            <i class="bi bi-pencil-square"></i>
                            {{ __('Edit Profile') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.edit.password', Auth::guard('web')->user()->slug) }}">
                            <i class="bi bi-unlock-fill"></i>
                            {{ __('Change Password') }}
                        </a>
                    </li>

                    <li><a href="dashboard.html">
                            <i class="bi bi-speedometer"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</section>
