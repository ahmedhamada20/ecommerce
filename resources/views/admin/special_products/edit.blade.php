<div class="modal fade" id="disputeModalEdit{{$row->id}}" tabindex="-1" aria-labelledby="disputeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disputeModalLabel">Edit special_products : {{$row->name()}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_special_products.update','test')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$row->id}}">
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">name Ar</label>
                        <input type="text" value="{{$row->name_ar}}" class="form-control" id="name_ar" name="name_ar" required>
                    </div>
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">name En</label>
                        <input type="text" value="{{$row->name_en}}" class="form-control" id="name_en" name="name_en" required>
                    </div>




                    <div class="mb-3">
                        <label for="details" class="form-label">description Ar</label>
                        <textarea id="editor" class="form-control" name="description_ar" rows="4" placeholder="description Ar...">{{$row->description_ar}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">description En</label>
                        <textarea id="editor2" class="form-control" name="description_en" rows="4" placeholder="description En">{{$row->description_en}}</textarea>
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
