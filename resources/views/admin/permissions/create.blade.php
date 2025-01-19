<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">اضفة صلاحية جديدة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin_permissions.store')}}" method="post">


                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>اسم الصلاحية</label>
                    <input id="name" class="form-control" type="text" autofocus name="name">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">اغلاق</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">تاكيد</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
