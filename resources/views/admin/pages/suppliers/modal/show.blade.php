<button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
    data-bs-target="#show_supplier{{ $supplier->id }}">
    <i class="bi bi-eye-fill"></i>
</button>

<div class="modal fade" id="show_supplier{{ $supplier->id }}" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content card text-white bg-dark mb-3">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Supplier Portfile ') }}</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <section class="section profile">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                    <img src="{{ $supplier->ImgSupplier }}" alt="{{ $supplier->avatar }}"
                                        class="rounded-circle">
                                    <h2>{{ $supplier->name }}</h2>
                                    <h4 class="text-primary">{{ __('Supplier') }}</h4>
                                    <div class="social-links mt-2">
                                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"></li>
                                    <li class="list-group-item">
                                        <h6 class="text-primary">{{ __('Products Quantity') }}
                                            <span class="float-end badge bg-info text-dark">
                                                {{ $supplier->products_count }}
                                            </span>
                                        </h6>

                                    </li>

                                    <li class="list-group-item ">
                                        <h6 class="text-primary">{{ __('Quantity') }}
                                            <span class="float-end">
                                        </h6>

                                        </span>
                                    </li>

                                    <li class="list-group-item">
                                        <h6 class="text-primary">{{ __('Categorie') }}
                                            <span class="float-end">
                                        </h6>

                                        </span>
                                    </li>

                                    <li class="list-group-item">
                                        <h6 class="text-primary">{{ __('Color') }}
                                            <span class="float-end">
                                        </h6>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card card text-white bg-dark mb-3">
                                <div class="card-body pt-3">
                                    <!-- Bordered Tabs -->
                                    <ul class="nav nav-tabs nav-tabs-bordered">

                                        <li class="nav-item">
                                            <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#profile-overview">{{ __('Overview') }}</button>
                                        </li>

                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#profile-edit">{{ __('Edit Profile') }}</button>
                                        </li>

                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#profile-settings">{{ __('Settings') }}</button>
                                        </li>

                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#profile-change-password">{{ __('Change Password') }}</button>
                                        </li>

                                    </ul>
                                    <div class="tab-content pt-2">

                                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                            <h5 class="card-title">{{ __('About') }}</h5>
                                            <p class="small fst-italic">{{ $supplier->about }}</p>
                                            <h5 class="card-title">{{ __('Profile Details') }}</h5>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label ">{{ __('Full Name') }}</div>
                                                <div class="col-lg-9 col-md-8">{{ $supplier->name }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">{{ __('E-email') }}</div>
                                                <div class="col-lg-9 col-md-8">{{ $supplier->email }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">{{ __('Phone') }}</div>
                                                <div class="col-lg-9 col-md-8">{{ $supplier->phone }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">{{ __('Gander') }}</div>
                                                <div class="col-lg-9 col-md-8">{{ $supplier->gander }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label"> {{ __('Address') }} </div>
                                                <div class="col-lg-9 col-md-8">{{ $supplier->location }}</div>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                            <!-- Profile Edit Form -->
                                            <form class="form-horizontal"
                                                action="{{ route('admin.supplier.update', $supplier->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row mb-3">
                                                    <label for="profileImage"
                                                        class="col-md-4 col-lg-3 col-form-label">{{ __('Profile Image') }}</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <img class="img-thumbnail" src="{{ $supplier->ImgSupplier }}"
                                                            alt="{{ $supplier->avatar }}">
                                                        <div class="pt-2">
                                                            <a href="#" class="btn btn-dark btn-sm"
                                                                title="Upload new profile image">
                                                                <input type="file" name="avatar"
                                                                    style="width: 90px;">
                                                                {{-- <i class="bi bi-upload"></i> --}}
                                                            </a>
                                                            {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="fullName"
                                                        class="col-md-4 col-lg-3 col-form-label">{{ __('Full Name') }}</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="name" type="text" class="form-control"
                                                            id="fullName"
                                                            value="{{ old('name', $supplier->name) }}">
                                                        @error('name')
                                                            <span class="text-danger" role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="about"
                                                        class="col-md-4 col-lg-3 col-form-label">{{ __('About') }}</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <textarea name="about" class="form-control" id="about" style="height: 100px">
                                                            {{ old('about', $supplier->about) }}
                                                        </textarea>
                                                        @error('about')
                                                            <span class="text-danger" role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="company"
                                                        class="col-md-4 col-lg-3 col-form-label">{{ __('Phone') }}</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="phone" type="text" class="form-control"
                                                            id="company"
                                                            value="{{ old('phone', $supplier->phone) }}">
                                                        @error('phone')
                                                            <span class="text-danger" role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="Job"
                                                        class="col-md-4 col-lg-3 col-form-label">{{ __('Gander') }}</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <select class="form-control" name="gander"
                                                            aria-label="Default select example">
                                                            <option value="0" selected>Choose Gander ...</option>
                                                            <option value="male"
                                                                {{ $supplier->gander == 'male' ? 'selected' : '' }}>
                                                                Male</option>
                                                            <option value="female"
                                                                {{ $supplier->gander == 'female' ? 'selected' : '' }}>
                                                                female</option>
                                                        </select>
                                                        @error('gander')
                                                            <span class="text-danger" role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="Country"
                                                        class="col-md-4 col-lg-3 col-form-label">{{ __('Address') }}
                                                    </label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="location" type="text" class="form-control"
                                                            id="Country"
                                                            value="{{ old('location', $supplier->location) }}">
                                                        @error('location')
                                                            <span class="text-danger" role="alert">
                                                                <strong>
                                                                    {{ $message }}
                                                                </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- <div class="row mb-3">
                                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                    <div class="col-md-8 col-lg-9">
                                                    <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-3">
                                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                    <div class="col-md-8 col-lg-9">
                                                    <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-3">
                                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                                    <div class="col-md-8 col-lg-9">
                                                    <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-3">
                                                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                                    <div class="col-md-8 col-lg-9">
                                                    <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                                                    </div>
                                                </div>
                        
                                                <div class="row mb-3">
                                                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                                    <div class="col-md-8 col-lg-9">
                                                    <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                                                    </div>
                                                </div> 
                        
                                                <div class="row mb-3">
                                                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                                    <div class="col-md-8 col-lg-9">
                                                    <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                                                    </div>
                                                </div> --}}

                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                                        {{ __('Save Changes') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade pt-3" id="profile-settings">
                                            <form>
                                                <div class="row mb-3">
                                                    <label for="fullName"
                                                        class="col-md-4 col-lg-3 col-form-label">Email
                                                        Notifications</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="changesMade" checked>
                                                            <label class="form-check-label" for="changesMade">
                                                                Changes made to your account
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="newProducts" checked>
                                                            <label class="form-check-label" for="newProducts">
                                                                Information on new products and services
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="proOffers">
                                                            <label class="form-check-label" for="proOffers">
                                                                Marketing and promo offers
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="securityNotify" checked disabled>
                                                            <label class="form-check-label" for="securityNotify">
                                                                Security alerts
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Save
                                                        Changes</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade pt-3" id="profile-change-password">
                                            <form
                                                action=" {{ route('admin.supplier.change.password', $supplier->id) }} "
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row mb-3">
                                                    <label for="currentPassword"
                                                        class="col-md-4 col-lg-3 col-form-label">{{ __('Current Password') }}</label>
                                                    <div class="col-md-6 ">
                                                        <input name="old_password" type="password"
                                                            class="form-control" id="currentPassword">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="newPassword"
                                                        class="col-md-4 col-lg-3 col-form-label">{{ __('New Password') }}</label>
                                                    <div class="col-md-6 ">
                                                        <input name="new_password" type="password"
                                                            class="form-control" id="newPassword">
                                                    </div>
                                                </div>

                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button type="submit"
                                                        class="btn btn-outline-primary btn-sm">{{ __('Change Password') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>

                            <h5 class="card-title" style="color: wheat">{{ 'My Products' }}</h5>
                            <hr>
                            <div class="row row-cols-1 row-cols-md-4 g-4">
                                @forelse ($supplier->products as $item)
                                    <div class="col">
                                        <div class="card card text-white bg-dark mb-3 h-100 ">
                                            <img src="{{ $item->mainPictureProduct }}" height="200" width="100"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title" style="color: wheat">
                                                    {{ $item->title }}
                                                </h5>

                                                <p class="card-text">
                                                    {{ $item->description }}
                                                </p>
                                                <hr>

                                                <p class="card-text">
                                                    {{ 'Price' }}
                                                    @if ($item->sale_price)
                                                        <span class="badge bg-danger float-end m-1">
                                                            <x-currancy :amount="$item->sale_price" />/
                                                            <del>
                                                                <x-currancy :amount="$item->price" />
                                                            </del>
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger float-end m-1">
                                                            <x-currancy :amount="$item->price" />/
                                                            <del>
                                                                <x-currancy :amount="$item->sale_price" />

                                                            </del>
                                                        </span>
                                                    @endif
                                                </p>

                                                <p class="card-text">
                                                    {{ __('Color') }}
                                                    @foreach ($item->theColors as $color)
                                                        <span
                                                            class="badge bg-danger float-end m-1">{{ $color }}
                                                        </span>
                                                    @endforeach
                                                </p>

                                                <p class="card-text">
                                                    {{ __('Size') }}
                                                    @foreach ($item->theSizes as $size)
                                                        <span
                                                            class="badge bg-danger float-end m-1">{{ $size }}
                                                        </span>
                                                    @endforeach
                                                </p>
                                                <p class="card-text">
                                                    {{ __('Categorie') }}
                                                    <span class="badge bg-danger float-end m-1">
                                                        {{ $item->categorie->c_name }}
                                                    </span>

                                                </p>

                                            </div>

                                            <div class="card-footer">
                                                <small class="text-muted">
                                                    {{ $item->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 text-center">
                                        <div class="alert alert-danger">
                                            <b>
                                                {{ __('There Are No Product !') }}
                                            </b>
                                        </div>
                                    </div>
                                @endforelse

                            </div>

                        </div>

                    </div>
                </section>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm"
                    data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
