<!-- Modal -->
<div class="modal fade" id="disputeModalEdit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create new User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_crm.update','test')}}" method="post">
                    @method('PUT')
                    @csrf
<input type="hidden" value="{{$row->id}}" name="id">
        
                        <div class="form-group">
                            <label for="first name"><i class="zmdi zmdi-account material-icons-first name"></i></label>
                            <input type="text" class="form-control" name="name" value="{{$row->name}}" id="first name" placeholder="Your first name" />
                        </div>

        
                

                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="form-control" name="email" value="{{$row->email}}" id="email" placeholder="Your Email" />
                        </div>

                    <div class="form-group">
                        <label for="phone"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="number" class="form-control"  name="phone" value="{{$row->phone}}" id="phone" placeholder="Your phone" />
                    </div>

                  
                

                    <div class="form-group">
                        <label for="first name"><i class="zmdi zmdi-account material-icons-first name"></i></label>
                        <input type="text" class="form-control" name="enquiry" value="{{$row->enquiry}}" id="first name" placeholder="Your first name" />
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>