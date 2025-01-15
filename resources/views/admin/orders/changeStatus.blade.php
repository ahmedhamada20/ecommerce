<!-- Modal -->
<div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_orders.update','test')}}" method="post">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id" value="{{$row->id}}">

                    <div class="row">
                        <div class="col">
                            <label>Status Orders</label>
                            <select class="form-control" name="status" required>
                                <option value="pending" {{$row->status == "pending" ? 'selected':null}}>pending</option>
                                <option value="processing" {{$row->status == "processing" ? 'selected':null}}>processing</option>
                                <option value="completed" {{$row->status == "completed" ? 'selected':null}}>completed</option>
                                <option value="completed" {{$row->status == "completed" ? 'selected':null}}>completed</option>
                                <option value="cancelled" {{$row->status == "cancelled" ? 'selected':null}}>cancelled</option>
                                <option value="refunded" {{$row->status == "refunded" ? 'selected':null}}>refunded</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
