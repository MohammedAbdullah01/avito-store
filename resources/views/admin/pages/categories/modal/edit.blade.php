<button type="button" class="btn btn-outline-success btn-sm m-1" data-bs-toggle="modal"
    data-bs-target="#edit{{ $cate->id }}">
    <i class="bi bi-pencil-square"></i>
</button>

<div class="modal fade" id="edit{{ $cate->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card text-primary mb-3">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Edit Categorie') }}</h5>
                <button type="button" class="btn-close btn-dark btn-sm" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body" style="padding: 0px">

                    <form action=" {{ route('admin.category.update', $cate->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <x-product.input-lable-error lable="Name" name="name" :value="$cate->name"
                            placeholder="Type The Name of The Department" />

                        <x-product.input-lable-error lable="Description" name="description" :value="$cate->description"
                            placeholder="Type The Description Of The Department" />

                        <x-product.input-lable-error type="file" lable="Avatar" name="avatar" />
                        <div class="form-group text-center" style="margin-top: 10px">
                            <img class="img-thumbnail" src="{{ $cate->AvatarCategory }}" alt="{{ $cate->avatar }}"
                                style="max-width: 300px">
                        </div>

                        <div class="modal-footer">
                            <x-profile.button-profile type="button" lable="Close" colorButton='dark' modal="modal" />

                            <x-profile.button-profile lable="Update" colorButton='success' />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
