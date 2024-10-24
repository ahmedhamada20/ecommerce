<!-- Modal -->
<div class="modal fade" id="EditModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Cairo', sans-serif;">تعديل البيانات</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('color.update','test')}}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <input type="hidden" value="{{$row->id}}" name="id">

                    <div class="row">
                        <div class="col">
                            <label> اللون <strong class="text-danger">*</strong></label>
                            <input type="color" value="{{$row->name}}" name="name" class="form-control" required>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
