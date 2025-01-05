<div class="modal fade" id="disputeModalEdit{{$row->id}}" tabindex="-1" aria-labelledby="disputeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disputeModalLabel">Edit hyper link sliders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_hyperLink_edit')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$row->id}}">
                    <input type="hidden" name="hypertoable_type" value="{{\App\Models\Slider::class}}">
                    <input type="hidden" name="hypertoable_id" value="{{$data->id}}">
                    <input type="hidden" name="type" value="{{App\Enums\HyperlinksEnum::SLIDER}}">
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">name Ar</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" required value="{{$row->name_ar}}">
                    </div>
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">name En</label>
                        <input type="text" class="form-control" id="name_en" name="name_en" required value="{{$row->name_en}}">
                    </div>

                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">link</label>
                        <input type="url" class="form-control" id="link" name="link" required value="{{$row->link}}">
                    </div>

                    <div class="mb-3">
                        <label for="evidence" class="form-label">Imges</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        @if($data->photo)
                            <img src="{{asset('storage/'.$data->photo->filename)}}" width="50px" height="50px" alt="">
                        @endif
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
