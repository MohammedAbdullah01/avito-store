<button class="btn btn-outline-success btn-sm " type="button" data-bs-target="#product_edit{{ $product->id }}"
    data-bs-toggle="modal">
    <i class="bi bi-pencil-square"></i>
</button>

<div class="modal fade" id="product_edit{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-dialog modal-lg">
        <div class="modal-content card shadow-lg p-3 mb-2 bg-body rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Edit Product') }}</h5>
                <button type="button" class="btn-close btn btn-dark" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('supplier.product.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row row-cols-2">

                            <x-product.input-lable-error lable="Title" name="title"
                                placeholder="Enter The Product Title" :value="$product->title" />

                            <x-product.select-product lable="Categories" name="category" :options="$categories"
                                :selected="$product->category_id" />

                            <x-product.input-lable-error col="col-md-4" lable="Original Price" name="price"
                                :value="$product->price" placeholder="Enter The Original Price" />

                            <x-product.input-lable-error col="col-md-4" lable="Sale Price" name="sale_price"
                                :value="$product->sale_price" placeholder="Enter The Sale Price" />

                            <x-product.input-lable-error col="col-md-4" lable="Quantity" name="quantity" type="number"
                                :value="$product->quantity" placeholder="Enter The Quantity" />

                            <x-product.input-lable-error col="col-md-12" lable="Description" name="description"
                                :value="$product->description" placeholder="Enter The Product Description" />

                            <x-product.input-lable-error lable="Color" name="color" data-role="tagsinput"
                                :value="$product->color" placeholder="Enter The Product Color" />

                            <x-product.input-lable-error lable="Size" name="size" data-role="tagsinput"
                                :value="$product->size" placeholder="Enter The Product Size" />

                            <x-product.input-lable-error type="file" lable="Main Picture" name="main_picture" />

                            <x-product.input-lable-error type="file" lable="Sub Pictures" name="sub_images[]"
                                multiple />

                            <div class="form-group" style="margin-top:8px">
                                <img src="{{ $product->mainPictureProduct }}" class="img-thumbnail"
                                    style="height: 100px; width: 100px;">
                            </div>

                            <div class="row row-cols-1 row-cols-md-3 ">
                                @forelse ($product->images as $image)
                                    <div class="col-6">
                                        <div class="mb-3 mt-2  ">
                                            <img src="{{ $image->subPictureProduct }}" class="img-thumbnail"
                                                style="height: 100px; width: 100px;">
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
