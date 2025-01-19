<!-- sample modal content -->
<div id="show_role{{$role->id}}" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">عرض صلاحيات : {{$role->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                @foreach(Spatie\Permission\Models\Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->where("role_has_permissions.role_id",$role->id)->get() as $v)
                                    <input type="text" class="fo" readonly value="{{ $v->name }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
