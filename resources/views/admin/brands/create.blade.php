<div class="modal fade" id="disputeModal" tabindex="-1" aria-labelledby="disputeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disputeModalLabel">Add new brands</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_brands.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                        <label for="orderNumber" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>




                    <div class="mb-3">
                        <label for="details" class="form-label">description Ar</label>
                        <textarea id="editor" class="form-control" name="description_ar" rows="4" placeholder="description Ar..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">description En</label>
                        <textarea id="editor2" class="form-control" name="description_en" rows="4" placeholder="description En"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="evidence" class="form-label">Imges</label>
                        <input type="file" class="form-control" id="evidence" name="image" accept="image/*">
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
