<div class="modal fade" id="disputeModal" tabindex="-1" aria-labelledby="disputeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disputeModalLabel">Add new Installment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_installments.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                        <label for="orderNumber" class="form-label">deposit</label>
                            <input type="number" class="form-control" id="deposit" name="deposit" required>
                    </div>

                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">down payment</label>
                            <input type="number" class="form-control" id="down_payment" name="down_payment" required>
                    </div>

                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">profit</label>
                            <input type="number" class="form-control" id="profit" name="profit" required>
                    </div>

                    <div class="mb-3">
                        <label for="orderNumber" class="form-label">min price</label>
                            <input type="number" class="form-control" id="min_price" name="min_price" required>
                    </div>




                    <div class="mb-3">
                        <label for="details" class="form-label">description Ar</label>
                        <textarea id="editor" class="form-control" name="description_ar" rows="4" placeholder="description Ar..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">description En</label>
                        <textarea id="editor2" class="form-control" name="description_en" rows="4" placeholder="description En"></textarea>
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
