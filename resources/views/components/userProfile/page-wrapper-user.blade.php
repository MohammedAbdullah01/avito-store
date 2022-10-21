<section class="section">
    <div class="container">
        <x-alert />
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline dashboard-menu text-center">

                    <li><a href="{{ route('user.dashboard') }}">
                            <i class="bi bi-speedometer"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.edit.profile') }}">
                            <i class="bi bi-pencil-square"></i>
                            {{ __('Edit Profile') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.edit.password') }}">
                            <i class="bi bi-unlock-fill"></i>
                            {{ __('Change Password') }}
                        </a>
                    </li>

                    <li><a href="{{ route('user.profile', Auth::guard('web')->user()->slug) }}">
                            <i class="bi bi-person-square"></i>
                            {{ __('Profile Details') }}
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>
