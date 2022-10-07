<!-- Modal -->
<div class="modal product-modal fade" id="product-modal-edit{{ $product->id }}">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="tf-ion-close"></i>
    </button>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">

                    <form action="{{ route('supplier.product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12">
                            <x-input-error lable="Title" placeholder="Enter The Product Title" name="title"
                                :value="$product->title" />
                        </div>

                        <div class="col-md-12">
                            <x-select lable="Categories" name="category" :options="$categories" :options="$categories"
                                :selected="$product->category_id" />
                        </div>

                        <div class="col-md-4">
                            <x-input-error lable="Original Price" placeholder="Enter The Original Price" name="price"
                                :value="$product->price" />
                        </div>

                        <div class="col-md-4">
                            <x-input-error lable="Sale Price" placeholder="Enter The Sale Price" name="sale_price"
                                :value="$product->sale_price" />
                        </div>

                        <div class="col-md-4">
                            <x-input-error lable="Quantity" placeholder="Enter The Quantity" name="quantity"
                                :value="$product->quantity" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error lable="Description" placeholder="Enter The Product Description"
                                name="description" :value="$product->description" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error lable="Color" name="color" data-role="tagsinput"
                                placeholder="Enter The Product Color" :value="$product->color" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error lable="Size" name="size" data-role="tagsinput"
                                placeholder="Enter The Product Size" :value="$product->size" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error type="file" lable="Main Picture" name="main_picture" />
                            <div class="mb-3 mt-2  ">
                                <img src="{{ $product->mainPictureProduct }}" class="img-thumbnail"
                                    style="height: 100px; width: 100px;">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <x-input-error type="file" lable="Sub Pictures" name="sub_images[]" multiple />

                            @forelse ($product->images as $image)
                                <div class="col-md-3">
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
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
