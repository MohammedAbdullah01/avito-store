<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-outline-primary btn-sm mb-2  " type="button" data-bs-toggle="modal"
        data-bs-target="#create_category">
        {{ __('Create Category') }}
    </button>
</div>

<div class="modal fade" id="create_category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" class="modal fade" id="create_category" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content card text-primary mb-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('New ategory') }}
                </h5>
                <button type="button" class="btn-close btn btn-dark" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <x-product.input-lable-error lable="Name" name="name"
                        placeholder="Type The Name of The Department" />

                    <x-product.input-lable-error lable="Description" name="description"
                        placeholder="Type The Description Of The Department" />

                    <x-product.input-lable-error type="file" lable="Avatar" name="avatar" />

                    <div class="modal-footer">
                        <x-profile.button-profile type="button" lable="Close" colorButton='dark' modal="modal" />

                        <x-profile.button-profile lable="Create" />
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
