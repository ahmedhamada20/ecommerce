<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create new User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_crm.store')}}" method="post">
                    @csrf

        
                        <div class="form-group">
                            <label for="first name"><i class="zmdi zmdi-account material-icons-first name"></i></label>
                            <input type="text" class="form-control" required name="name" id="first name" placeholder="Your first name" />
                        </div>

        
                

                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" class="form-control"  required name="email" id="email" placeholder="Your Email" />
                        </div>

                    <div class="form-group">
                        <label for="phone"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="number" class="form-control" required  name="phone" id="phone" placeholder="Your phone" />
                    </div>

                    <div class="form-group">
                        <label for="first name"><i class="zmdi zmdi-account material-icons-first name"></i></label>
                        <input type="text" class="form-control"  name="enquiry" id="first name" placeholder="enquiry" />
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