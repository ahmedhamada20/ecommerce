<!-- Modal -->
<div class="modal fade" id="DeletedModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Cairo', sans-serif;">حذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('brands.destroy','test')}}" method="post" autocomplete="off">
                    @csrf
                    @method('Delete')

                    <input type="hidden" value="{{$row->id}}" name="id">
                    <input type="hidden" value="{{$row->image}}" name="old_file">

                    <div class="row">
                        <div class="col">
                            <label class="text-red">هل أنت متأكد من عمليه الحذف ؟؟</label>
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
