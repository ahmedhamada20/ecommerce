<!-- sample modal content -->
<div id="edit{{$role->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">تعديل صلاحية : {{$role->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('admin_permissions.update',$role->id)}}" autocomplete="off"
                  method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>اسم الصلاحية</label>
                        <input id="name" class="form-control" type="text" value="{{$role->name}}" autofocus name="name">
                        <input type="hidden" name="id" value="{{$role->id}}">
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
