<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create new User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_register')}}" method="post">
                    @csrf

        
                        <div class="form-group">
                            <label for="first name"><i class="zmdi zmdi-account material-icons-first name"></i></label>
                            <input type="text" class="form-control" name="first_name" id="first name" placeholder="Your first name" />
                        </div>

                        <div class="form-group">
                            <label for="last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Your last name" />
                        </div>
                

                    

                    <div class="form-group">
                        <label for="phone"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="number" class="form-control"  name="phone" id="phone" placeholder="Your phone" />
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" />
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" class="form-control" name="password" id="pass" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" class="form-control" name="password_confirmation" id="re_pass"
                            placeholder="Repeat your password" />
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