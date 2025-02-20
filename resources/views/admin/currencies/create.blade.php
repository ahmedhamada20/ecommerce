<div class="modal fade" id="disputeModal" tabindex="-1" aria-labelledby="disputeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disputeModalLabel">Add new currencies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_currencies.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">name Ar</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                    </div>
                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">name En</label>
                        <input type="text" class="form-control" id="name_en" name="name_en" required>
                    </div>

                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">type</label>
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>


                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>


                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">
                            rate</label>
                        <input type="number" class="form-control" id="rate" name="rate" required>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
</div>
