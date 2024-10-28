<!-- Modal -->
<div class="modal fade" id="addQuantity{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Cairo', sans-serif;">حذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('add_quantity')}}" method="post" autocomplete="off">
                    @csrf

                    <input type="hidden" value="{{$row->id}}" name="id">


                    <div class="row">
                        <div class="col">
                            <label class="text-info">كيمه المنتج</label>
                            <input type="number"  name="quantity" class="form-control">
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
