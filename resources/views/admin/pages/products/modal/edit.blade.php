<button class="btn btn-outline-success btn-sm " type="button" data-bs-target="#product_edit{{ $product->id }}"
    data-bs-toggle="modal">
    <i class="bi bi-pencil-square"></i>
</button>

<div class="modal fade" id="product_edit{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card shadow-lg p-3  bg-body rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Edit Product') }}</h5>
                <button type="button" class="btn-close btn btn-dark" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row row-cols-2">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Name') }}
                                </label>
                                <input type="text" class="form-control" name="title" value="{{ $product->title }}">
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
                                    <option value="" selected>
                                        {{ __('Choose Categorie') }}
                                    </option>
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}"
                                            {{ $product->category_id == $cate->id ? 'selected' : '' }}>
                                            {{ $cate->name }}
                                        </option>
                                    @endforeach
                                    @error('categorie_id')
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </select>
                            </div>
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Price') }}
                                </label>
                                <input type="text" class="form-control" name="price"
                                    value="{{ $product->price }}">
                                @error('price')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Sale Price') }}
                                </label>
                                <input type="text" class="form-control" name="sale_price" placeholder="$"
                                    value="{{ $product->sale_price }}">
                                @error('sale_price')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Description') }}
                                </label>
                                <input type="text" class="form-control" name="description"
                                    placeholder="Write The Product Description"
                                    value="{{ old('description', $product->description) }}">
                                @error('description')
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
                                    placeholder="Write The Product Description"
                                    value="{{ old('quantity', $product->quantity) }}">

                                @error('quantity')
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

                                <input type="text" class="form-control" name="color" data-role="tagsinput"
                                    value="{{ $product->color }}">

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
                                    value="{{ old('size', $product->size) }}">
                                @error('size')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
{{-- 
                            <div class="col-12 mt-2">
                                <label for="recipient-name" class="col-form-label w-100">
                                    {{ __('Tags') }}
                                </label>
                                <hr>
                                @forelse ($tags as  $tag)
                                    <div class="form-check d-inline-block ">
                                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                            name="tags[]" id="{{ $tag->id }}"
                                            @if (in_array(
                                                $tag->id,
                                                $product->tags()->pluck('id', 'name')->toArray())) {{ 'checked' }} @endif>

                                        <span class="text-primary" for="{{ $tag->id }}">
                                            {{ $tag->name }}
                                        </span>
                                    </div>
                                @empty
                                    <p class="text-center text-danger">
                                        {{ 'There Are No Tags ?' }}
                                    </p>
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


                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Main Picture') }}
                                </label>
                                <input type="file" class="form-control" name="main_picture">
                                <div class="form-group" style="margin-top:8px">
                                    <img src="{{ $product->mainPictureProduct }}" class="img-thumbnail"
                                        style="height: 100px">
                                </div>
                                @error('main_picture')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">
                                    {{ __('Sub Pictures') }}
                                </label>
                                <input type="file" class="form-control" multiple name="sub_images[]">
                                @error('sub_images.*')
                                    <span class="text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror



                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @forelse ($product->images as $image)
                                        <div class="col-6">
                                            <div class="mb-3 mt-2  ">
                                                <img src="{{ $image->subPictureProduct }}" class="img-thumbnail"
                                                    style="height: 100px">
                                            </div>
                                        </div>
                                    @empty

                                        <div class="col-md-12 ">
                                            <div class=" alert alert-danger text-center mt-2">
                                                {{ __('There Are No Sub Images !') }}
                                            </div>

                                        </div>
                                    @endforelse
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-dismiss="modal">
                            {{ __('Close') }}
                        </button>
                        <button type="submit" class="btn btn-sm btn-outline-success">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
