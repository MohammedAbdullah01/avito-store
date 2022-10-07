<button class="btn btn-primary" data-toggle="modal" data-target="#product-modal-create">
    {{ __('Create Product') }}
</button>


<!-- Modal -->
<div class="modal product-modal fade" id="product-modal-create">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="bi bi-x-circle-fill"></i>
    </button>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('supplier.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="col-md-12">
                            <x-input-error lable="Title" placeholder="Enter The Product Title" name="title" />
                        </div>

                        <div class="col-md-12">
                            <x-select lable="Categories" name="category" :options="$categories" />
                        </div>

                        <div class="col-md-4">
                            <x-input-error lable="Original Price" placeholder="Enter The Original Price"
                                name="price" />
                        </div>

                        <div class="col-md-4">
                            <x-input-error lable="Sale Price" placeholder="Enter The Sale Price" name="sale_price" />
                        </div>

                        <div class="col-md-4">
                            <x-input-error lable="Quantity" placeholder="Enter The Quantity" name="quantity" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error lable="Description" placeholder="Enter The Product Description"
                                name="description" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error lable="Color" name="color" data-role="tagsinput"
                                placeholder="Enter The Product Color" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error lable="Size" name="size" data-role="tagsinput"
                                placeholder="Enter The Product Size" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error type="file" lable="Main Picture" name="main_picture" />
                        </div>

                        <div class="col-md-12">
                            <x-input-error type="file" lable="Sub Pictures" name="sub_images[]" multiple />
                        </div>

                        <x-button colorButton="primary mt-3" value="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
