@extends('admin.layouts.master')
@section('title')
Create New Product
@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/styles/choices.min.css" />
<!-- Choices.js JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.js"></script>
<link rel="stylesheet" href="{{ asset('dash/assets/css/create.css') }}" />
@endsection
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4 text-primary">Create New Product</h3>

            <!-- Dynamic Error Alert -->
            <div class="alert alert-danger d-none" id="error-alert">
                <ul id="error-list"></ul>
            </div>

            <form method="post" enctype="multipart/form-data" action="{{ route('admin_products.store') }}">
                @csrf
                <!-- Product Basic Info -->
                <div class="form-section">
                    <h5>Basic Information</h5>

                    <div class="row">
                        <!-- Product Images -->
                        <div class="form-section">
                            <h5>Images</h5>
                            <div class="mb-3">
                        <label class="form-label">Upload Images</label>
                        <input type="file" class="form-control" name="images[]" multiple>
                                <div class="image-preview" id="image-preview"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name_ar" class="form-label">Alt image (AR)</label>
                                    <input type="text" class="form-control" id="name_ar" name="name_ar"
                                        placeholder="Arabic name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name_en" class="form-label">Alt image (EN)</label>
                                    <input type="text" class="form-control" id="english_ar" name="name_en"
                                        placeholder="English name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name (AR)</label>
                            <input type="text" class="form-control" name="name_ar" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name (EN)</label>
                            <input type="text" class="form-control" name="name_en" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="slug_en" class="form-label">Slug (EN)</label>
                            <input type="text" class="form-control" id="slug_en" name="slug_en"
                                placeholder="Unique identifier" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug_ar" class="form-label">Slug (AR)</label>
                            <input type="text" class="form-control" id="slug_ar" name="slug_ar"
                                placeholder="Unique identifier" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="SKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="SKU" name="SKU"
                                placeholder="Stock Keeping Unit">
                        </div>
                    </div>
                </div>
                <!-- Product Descriptions -->
                <div class="form-section">
    <h5>Descriptions</h5>
    <div id="DescriptionContainer">
        <!-- أول وصف بشكل افتراضي -->
        <div class="row align-items-center mb-3 description-item">
            <div class="col-md-4">
                <input type="text" class="form-control" name="Description[name_ar][]" placeholder="اسم الوصف (عربي)">
                <input type="text" class="form-control mt-2" name="Description[name_en][]" placeholder="اسم الوصف (إنجليزي)">
            </div>
            <div class="col-md-6">
                <div class="description-values">
                    <div class="row align-items-center mb-2">
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Description[value_ar][]" placeholder="قيمة الوصف (عربي)">
                            <input type="text" class="form-control mt-2" name="Description[value_en][]" placeholder="قيمة الوصف (إنجليزي)">
                        </div>
                        <div class="col-md-3 text-end">
                            <button type="button" class="btn btn-danger remove-description">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-Description">+ Add Description</button>
</div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="short_description_ar" class="form-label">Short Description (AR)</label>
                        <textarea class="form-control" id="short_description_ar" name="short_description_ar"
                            rows="3"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="short_description_en" class="form-label">Short Description (EN)</label>
                        <textarea class="form-control" id="short_description_en" name="short_description_en"
                            rows="3"></textarea>
                    </div>
                </div>
                <!-- Stock Status, Quantity, and Shipping -->
                <div class="form-section">
                    <h5>Stock & Shipping Information</h5>
                    <div class="row">
                        <!-- Stock Status -->
                        <div class="col-md-4 mb-3">
                            <label for="stock_status" class="form-label">Stock Status</label>
                            <select class="form-control custom-select" id="stock_status" name="stock_status" required>
                                <option value="in_stock">In Stock</option>
                                <option value="out_of_stock">Out of Stock</option>
                                <option value="pre_order">Pre-Order</option>
                            </select>
                        </div>
                        <!-- Quantity -->
                        <div class="col-md-4 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="Quantity in stock" min="0" required>
                        </div>
                        <!-- Weight -->
                        <div class="col-md-4 mb-3">
                            <label for="weight" class="form-label">Weight (g)</label>
                            <input type="number" class="form-control" id="weight" name="weight"
                                placeholder="Weight in grams" step="0.01" required>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Length -->
                        <div class="col-md-4 mb-3">
                            <label for="length" class="form-label">Length (cm)</label>
                            <input type="number" class="form-control" id="length" name="length"
                                placeholder="Length in cm" step="0.01">
                        </div>
                        <!-- Width -->
                        <div class="col-md-4 mb-3">
                            <label for="width" class="form-label">Width (cm)</label>
                            <input type="number" class="form-control" id="width" name="width" placeholder="Width in cm"
                                step="0.01">
                        </div>
                        <!-- Height -->
                        <div class="col-md-4 mb-3">
                            <label for="height" class="form-label">Height (cm)</label>
                            <input type="number" class="form-control" id="height" name="height"
                                placeholder="Height in cm" step="0.01">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Discount (%)</label>
                            <input type="number" class="form-control" name="discount_price" step="0.01">
                        </div>
                        <div class="col-md-6 mb-3">
    <label for="type_discount" class="form-label">Discount Type</label>
    <select class="form-control" id="type_discount" name="type_discount">
        <option value="" selected>None</option>
        <option value="percentage">Percentage</option>
        <option value="cash">Cash</option>
    </select>
</div>
                    </div>
                </div>

                <!-- Colors Section -->
<div class="form-section">
    <h5>Colors</h5>
    <div id="color-container">
        <div class="row align-items-center mb-3 color-row">
            <div class="col-md-3">
                <label class="form-label">Color</label>
                <input type="color" class="form-control form-control-color" name="colors[code][]" value="#ffffff">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Color Name (e.g., White)" name="colors[name][]">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" placeholder="Size (e.g., Small, Medium)" name="colors[size][]">
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" placeholder="Quantity" name="colors[quantity][]">
            </div>
            <div class="col-md-2 text-end">
                <button type="button" class="btn btn-danger remove-row">Delete</button>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-secondary btn-sm" id="add-color">+ Add Color</button>
</div>


                <!-- Product Specifications -->
                <div class="form-section">
                    <h5>Specifications</h5>
                    <div id="specifications" class="specifications">
                        <div class="specification-item">
                            <input type="text" class="form-control" name="specification_name[]"
                                placeholder="Specification Name">
                            <input type="text" class="form-control" name="specification_value[]"
                                placeholder="Specification Value">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-specification">+ Add
                        Specification
                    </button>
                </div>

                <!-- SEO Information -->
                <div class="form-section">
                    <h5>SEO Information</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="meta_title_ar" class="form-label">Meta Title (AR)</label>
                            <input type="text" class="form-control" id="meta_title_ar" name="meta_title_ar"
                                placeholder="Meta title for SEO in Arabic">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta_title_en" class="form-label">Meta Title (EN)</label>
                            <input type="text" class="form-control" id="meta_title_en" name="meta_title_en"
                                placeholder="Meta title for SEO in English">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="meta_description_ar" class="form-label">Meta Description (AR)</label>
                            <textarea class="form-control" id="meta_description_ar" name="meta_description_ar" rows="3"
                                placeholder="Meta description for SEO in Arabic"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta_description_en" class="form-label">Meta Description (EN)</label>
                            <textarea class="form-control" id="meta_description_en" name="meta_description_en" rows="3"
                                placeholder="Meta description for SEO in English"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="canonical_ar" class="form-label">Canonical URL (AR)</label>
                            <input type="text" class="form-control" id="canonical_ar" name="canonical_ar"
                                placeholder="Canonical URL in Arabic">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="canonical_en" class="form-label">Canonical URL (EN)</label>
                            <input type="text" class="form-control" id="canonical_en" name="canonical_en"
                                placeholder="Canonical URL in English">
                        </div>
                    </div>
                </div>

             <!-- Categories and Options -->
<div class="form-section">
    <h5>Categories & Options</h5>
    <div class="mb-3">
        <label for="categories" class="form-label">Assign to Categories</label>
        <div class="custom-multi-select">
            <button type="button" class="dropdown-toggle" id="categoriesDropdown">
                Select Categories
            </button>
            <ul class="dropdown-menu" id="categoriesMenu">
                @foreach($categories as $category)
                    <li>
                        <label>
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
        <small class="text-muted">Click to open the dropdown and select multiple categories.</small>
    </div>
</div>
                <div class="form-section">
                    <h5>Related Products</h5>
                    <div id="related-products-list">
                        <div class="input-group mb-3">
                            <select class="form-control" name="related_products[]">
                                <option value="" disabled selected>Select a product</option>
                              
                                    <option value=""></option>
                                
                            </select>
                            <button class="btn btn-danger remove-related-product" type="button">Remove</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" id="add-related-product">+ Add Related Product</button>
                </div>
                

              <!-- Brand -->
<div class="form-section">
    <h5>Brand</h5>
    <div class="mb-3">
        <label for="brand" class="form-label">Select a Brand</label>
        <select id="brand" name="brand_id" class="form-control">
            <option value="" disabled selected>Select a brand...</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
</div>


                <!-- Labels -->
                <div class="form-section">
                    <h5>Labels</h5>
                    <div class="checkbox-group">
                        <div>
                            <input type="checkbox" id="hot" name="labels[hot]" value="1">
                            <label for="hot">Hot</label>
                        </div>
                        <div>
                            <input type="checkbox" id="new" name="labels[new]" value="1">
                            <label for="new">New</label>
                        </div>
                        <div>
                            <input type="checkbox" id="sale" name="labels[sale]" value="1">
                            <label for="sale">Sale</label>
                        </div>
                    </div>
                </div>

                <!-- Taxes -->
                <div class="form-section">
                    <h5>Taxes</h5>
                    <div id="taxes-container">
                        <!-- Existing Taxes -->
                        <div class="row align-items-center mb-3">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="tax_names[]"
                                    placeholder="Tax Name (e.g., VAT)">
                            </div>
                            <div class="col-md-5">
                                <input type="number" class="form-control" name="tax_rates[]" placeholder="Tax Rate (%)"
                                    min="0" step="0.01">
                            </div>
                            <div class="col-md-2 text-end">
                                <button type="button" class="btn btn-danger remove-tax">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" id="add-tax">+ Add Tax</button>
                </div>
                <div class="form-section">
    <h5>Coupon</h5>
    <div id="coupon-container">
        <div class="row align-items-center mb-3">
            <div class="col-md-4">
                <select class="form-control" name="coupon_ids[]" >
                    <option value="" disabled selected>Select a Coupon</option>
                    @foreach($coupons as $coupon)
                        <option value="{{ $coupon->id }}">
                            {{ $coupon->code }} ({{ $coupon->value }}%)
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div class="col-md-2 text-end">
                <button type="button" class="btn btn-danger remove-coupon">Remove</button>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-secondary btn-sm" id="add-coupon">+ Add Coupon</button>
</div>



                <!-- Minimum Order Quantity -->
                <div class="form-section">
                    <h5>Minimum Order Quantity</h5>
                    <div class="mb-3">
                        <label for="min_order_quantity" class="form-label">Minimum Order Quantity</label>
                        <input type="number" class="form-control" id="min_order_quantity" name="min_order_quantity"
                            value="0" min="0">
                        <small class="text-muted">Minimum quantity to place an order. If the value is 0, there is no
                            limit.</small>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Image preview functionality
    const imageInput = document.getElementById('images');
    const imagePreview = document.getElementById('image-preview');

    imageInput?.addEventListener('change', function (event) {
        imagePreview.innerHTML = '';
        Array.from(event.target.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageContainer = document.createElement('div');
                imageContainer.classList.add('image-container');
                imageContainer.innerHTML = `
                    <img src="${e.target.result}" alt="Uploaded Image" class="preview-image">
                    <button type="button" class="btn btn-danger btn-sm remove-image" data-index="${index}">Delete</button>
                `;
                imagePreview.appendChild(imageContainer);
            };
            reader.readAsDataURL(file);
        });
    });

    imagePreview?.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-image')) {
            event.target.closest('.image-container')?.remove();
        }
    });

    // Function to handle adding rows dynamically
    const addRowHandler = (buttonId, containerId, template) => {
        document.getElementById(buttonId)?.addEventListener('click', function () {
            const container = document.getElementById(containerId);
            const newRow = document.createElement('div');
            newRow.classList.add('row', 'align-items-center', 'mb-3');
            newRow.innerHTML = template;
            container.appendChild(newRow);
        });
    };

    addRowHandler('add-specification', 'specifications', `
        <div class="col-md-5">
            <input type="text" class="form-control" name="specification_name[]" placeholder="Specification Name">
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" name="specification_value[]" placeholder="Specification Value">
        </div>
        <div class="col-md-2 text-end">
            <button type="button" class="btn btn-danger remove-row">Delete</button>
        </div>
    `);

    addRowHandler('add-Description', 'Description', `
        <div class="col-md-4">
            <input type="text" class="form-control" name="Description['name'][]" placeholder="Description Name">
        </div>
        <div class="col-md-6">
            <div class="description-values">
                <div class="row align-items-center mb-2">
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="Description['value'][]" placeholder="Description Value">
                    </div>
                    <div class="col-md-3 text-end">
                        <button type="button" class="btn btn-danger remove-value">Remove</button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm mt-2 add-value">+ Add Description Value</button>
        </div>
        <div class="col-md-2 text-end">
            <button type="button" class="btn btn-danger remove-description">Delete Description</button>
        </div>
    `);

    // Event delegation for dynamically added elements
    document.body.addEventListener('click', function (event) {
        // Handle "Add Description Value"
        if (event.target.classList.contains('add-value')) {
            const descriptionValuesContainer = event.target.closest('.col-md-6').querySelector('.description-values');
            const newValueRow = document.createElement('div');
            newValueRow.classList.add('row', 'align-items-center', 'mb-2');
            newValueRow.innerHTML = `
                <div class="col-md-9">
                    <input type="text" class="form-control" name="Description['value'][]" placeholder="Description Value">
                </div>
                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-danger remove-value">Remove</button>
                </div>
            `;
            descriptionValuesContainer.appendChild(newValueRow);
        }

        // Handle "Remove Description Value"
        if (event.target.classList.contains('remove-value')) {
            event.target.closest('.row').remove();
        }

        // Handle "Delete Description"
        if (event.target.classList.contains('remove-description')) {
            event.target.closest('.description-item').remove();
        }

        // Handle "Remove Row" for specifications
        if (event.target.classList.contains('remove-row')) {
            event.target.closest('.row')?.remove();
        }
    });

    // Dynamic dropdown logic for categories
    const dropdownToggle = document.getElementById('categoriesDropdown');
    const dropdownMenu = document.getElementById('categoriesMenu');

    dropdownToggle?.addEventListener('click', () => {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', (event) => {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });

    dropdownMenu?.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            const selected = Array.from(dropdownMenu.querySelectorAll('input[type="checkbox"]:checked'))
                .map((cb) => cb.parentElement.textContent.trim());
            dropdownToggle.textContent = selected.length ? selected.join(', ') : 'Select Categories';
        });
    });

    // Form validation
    const productForm = document.querySelector('.product-form');
    productForm?.addEventListener('submit', function (event) {

        const requiredFields = ['name_en', 'price', 'stock_status', 'quantity', 'weight'];
        const errors = requiredFields
            .map((id) => ({ id, value: document.getElementById(id)?.value }))
            .filter((field) => !field.value)
            .map((field) => `${field.id.replace('_', ' ').toUpperCase()} is required.`);

        const errorAlert = document.getElementById('error-alert');
        const errorList = document.getElementById('error-list');

        if (errors.length) {
            errorList.innerHTML = errors.map((error) => `<li>${error}</li>`).join('');
            errorAlert?.classList.remove('d-none');
        } else {
            alert('Form submitted successfully!');
        }
    });

    // Add a color row dynamically
    const addColorRow = () => {
        const container = document.getElementById('color-container');
        const colorCount = container.querySelectorAll('.row').length + 1;

        container.insertAdjacentHTML('beforeend', `
            <div class="row align-items-center mb-3">
                <div class="col-md-3">
                    <label for="color${colorCount}" class="form-label">Color ${colorCount}</label>
                    <input type="color" class="form-control form-control-color" id="color${colorCount}" name="colors['name'][]" value="#000000">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Color Name" name="colors['name'][]">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Enter size (e.g., Small, Medium)" name="colors['size'][]">
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" placeholder="Quantity" name="colors['quantity'][]">
                </div>
                <div class="col-md-2 text-end">
                    <button type="button" class="btn btn-danger remove-row">Delete</button>
                </div>
            </div>
        `);
    };

    document.getElementById('add-color')?.addEventListener('click', addColorRow);
});
document.addEventListener('DOMContentLoaded', function () {
    const addRelatedProductRow = () => {
        const relatedProductsList = document.getElementById('related-products-list');

        const newRelatedProductRow = document.createElement('div');
        newRelatedProductRow.classList.add('input-group', 'mb-3');
        const productsDropdown = `
            <select class="form-control" name="related_products[]">
                <option value="" disabled selected>Select a product</option>
                ${productsOptions}
            </select>
            <button class="btn btn-danger remove-related-product" type="button">Remove</button>
        `;

        newRelatedProductRow.innerHTML = productsDropdown;
        relatedProductsList.appendChild(newRelatedProductRow);
    };

    const productsOptions = Array.from(document.querySelectorAll('#related-products-list select:first-child option'))
        .map(option => option.outerHTML)
        .join('');

    document.getElementById('add-related-product')?.addEventListener('click', addRelatedProductRow);

    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-related-product')) {
            event.target.closest('.input-group')?.remove();
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Add Tax Row
    const addTaxRow = () => {
        const taxesContainer = document.getElementById('taxes-container');

        const newTaxRow = document.createElement('div');
        newTaxRow.classList.add('row', 'align-items-center', 'mb-3');
        newTaxRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" class="form-control" name="tax_names[]" placeholder="Tax Name (e.g., VAT)">
            </div>
            <div class="col-md-5">
                <input type="number" class="form-control" name="tax_rates[]" placeholder="Tax Rate (%)" min="0" step="0.01">
            </div>
            <div class="col-md-2 text-end">
                <button type="button" class="btn btn-danger remove-tax">Remove</button>
            </div>
        `;

        taxesContainer.appendChild(newTaxRow);
    };

    // Add Coupon Row
    const addCouponRow = () => {
        const couponContainer = document.getElementById('coupon-container');

        const newCouponRow = document.createElement('div');
        newCouponRow.classList.add('row', 'align-items-center', 'mb-3');
        newCouponRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" class="form-control" name="coupon_names[]" placeholder="Coupon">
            </div>
            <div class="col-md-5">
                <input type="number" class="form-control" name="coupon_number[]" placeholder="Coupon" min="0">
            </div>
            <div class="col-md-2 text-end">
                <button type="button" class="btn btn-danger remove-coupon">Remove</button>
            </div>
        `;

        couponContainer.appendChild(newCouponRow);
    };

    // Attach event listeners to "Add Tax" and "Add Coupon" buttons
    document.getElementById('add-tax')?.addEventListener('click', addTaxRow);
    document.getElementById('add-coupon')?.addEventListener('click', addCouponRow);

    // General event delegation for removing rows
    document.body.addEventListener('click', function (event) {
        // Remove Tax Row
        if (event.target.classList.contains('remove-tax')) {
            event.target.closest('.row')?.remove();
        }

        // Remove Coupon Row
        if (event.target.classList.contains('remove-coupon')) {
            event.target.closest('.row')?.remove();
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Get the form and save button
    const form = document.querySelector('.product-form');
    const saveButton = document.getElementById('save-product');

    // Listen for form submission
    form.addEventListener('submit', function (event) {
         // Prevent the form from submitting immediately

        // Show a confirmation dialog before submitting
        // const isConfirmed = confirm('Are you sure you want to save the product?');

        // if (isConfirmed) {
        //     // Show a loading spinner
        //     saveButton.disabled = true; // Disable the button to prevent multiple clicks
        //     saveButton.innerHTML = 'Saving... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

        //     // Simulate form submission with a timeout (you can replace this with actual form submission via AJAX)
        //     setTimeout(() => {
        //         form.submit(); // Submit the form after the "loading" state
        //     }, 2000); // Simulate a delay of 2 seconds
        // }
    });
});

</script>
<script>
    document.getElementById('add-Description').addEventListener('click', function() {
        let container = document.getElementById('DescriptionContainer');
        let newDescription = `
            <div class="row align-items-center mb-3 description-item">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="Description[name_ar][]" placeholder="اسم الوصف (عربي)">
                    <input type="text" class="form-control mt-2" name="Description[name_en][]" placeholder="اسم الوصف (إنجليزي)">
                </div>
                <div class="col-md-6">
                    <div class="description-values">
                        <div class="row align-items-center mb-2">
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="Description[value_ar][]" placeholder="قيمة الوصف (عربي)">
                                <input type="text" class="form-control mt-2" name="Description[value_en][]" placeholder="قيمة الوصف (إنجليزي)">
                            </div>
                            <div class="col-md-3 text-end">
                                <button type="button" class="btn btn-danger remove-description">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newDescription);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-description')) {
            event.target.closest('.description-item').remove();
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.form-control').select2();
    });
</script>
@endsection