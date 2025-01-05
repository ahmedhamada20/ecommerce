<div class="modal fade" id="deleted{{$row->id}}" tabindex="-1" aria-labelledby="disputeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disputeModalLabel">Deleted hyper link sliders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_hyperLink_deleted')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$row->id}}">
                    <input type="hidden" name="hypertoable_type" value="{{\App\Models\Slider::class}}">
                    <input type="hidden" name="hypertoable_id" value="{{$data->id}}">
                    <input type="hidden" name="type" value="{{App\Enums\HyperlinksEnum::SLIDER}}">
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">are you sure deleted</label>
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
