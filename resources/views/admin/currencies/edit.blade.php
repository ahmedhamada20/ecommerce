<div class="modal fade" id="disputeModalEdit{{$row->id}}" tabindex="-1" aria-labelledby="disputeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disputeModalLabel">Edit {{$row->name()}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_currencies.update','test')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" value="{{$row->id}}" name="id">
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">name Ar</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{$row->name_ar}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">name En</label>
                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{$row->name_en}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{$row->type}}" required>
                    </div>


                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">country</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{$row->country}}" required>
                    </div>


                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">
                            rate</label>
                        <input type="number" class="form-control" id="rate" name="rate" value="{{$row->rate}}" required>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
</div>
