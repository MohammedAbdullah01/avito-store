<div class=" d-md-flex justify-content-md-end mb-2 ">
    <button type="button" class="btn btn-outline-primary btn-sm  " data-bs-toggle="modal" data-bs-target="#create_product">
        {{ __('Create Product') }}
    </button>
</div>

<div class="modal fade" id="create_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card shadow-lg p-3  bg-body rounded mb-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('New Product') }}</h5>
                <button type="button" class="btn-close btn btn-light" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="container">
                        <div class="row row-cols-2">
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Name') }}
                                </label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                    placeholder="Write the product name no less than 4 characters and no more than 25">
                                @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Categories') }}
                                </label>

                                <select class="form-control" name="category" aria-label="Default select example">
                                    <option value="">
                                        {{ __('Choose Categorie') }}
                                    </option>
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}">
                                            {{ $cate->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Price') }}
                                </label>
                                <input type="text" class="form-control" name="price"
                                    placeholder="$ Enter The Original Product Price" value="{{ old('price') }}">
                                @error('price')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Sale Price') }}
                                </label>
                                <input type="text" class="form-control" name="sale_price"
                                    placeholder="$ Enter The Product Price After The Discount"
                                    value="{{ old('sale_price') }}">
                                @error('sale_price')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Quantity') }}
                                </label>
                                <input type="number" class="form-control" name="quantity"
                                    placeholder="Write The Product Description" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Description') }}
                                </label>
                                <input type="text" class="form-control" name="description"
                                    placeholder="Write The Product Description" value="{{ old('description') }}">
                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Color') }}
                                </label>

                                <input type="text" class="form-control " name="color" data-role="tagsinput"
                                    value="{{ old('color') }}">

                                @error('color')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Size') }}
                                </label>

                                <input type="text" class="form-control " name="size" data-role="tagsinput"
                                    value="{{ old('size') }}">
                                @error('size')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="col-md-12">
                                <label for="recipient-name" class="col-form-label w-100">
                                    {{ __('Tags') }}
                                </label>
                                <hr>
                                @forelse ($tags as  $tag)
                                    <div class="form-check d-inline-block m-1">
                                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                            name="tags[]" id="{{ $tag->id }}">
                                        <label class="form-check-label" for="{{ $tag->id }}">
                                            {{ $tag->name }}
                                        </label>
                                    </div>

                                @empty
                                    <span class="alert alert-danger text-center">
                                        {{ 'There Are No Tags' }} <i class="bi bi-emoji-frown-fill"></i>
                                    </span>
                                @endforelse

                                @error('tags')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                                <hr>
                            </div> --}}

                            <div class="col">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Main Picture') }}
                                </label>
                                <input type="file" class="form-control mb-4" name="main_picture">
                                @error('main_picture')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Sub Pictures') }}
                                </label>
                                <input type="file" class="form-control mb-4" name="sub_images[]" multiple>
                                @error('sub_images')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                                @error('sub_images.*')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                            {{ __('Close') }}
                        </button>

                        <button type="submit" class="btn btn-sm btn-outline-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
