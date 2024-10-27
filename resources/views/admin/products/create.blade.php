@extends('admin.layouts.master')
@section('css')
    <link href="{{asset('dash/vendor/boorstarp-fileUpdload/css/fileinput.css')}}" rel="stylesheet">
@endsection

@section('title')
    اضافه منتج جديد
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-8 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اضافه منتج جديد</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- File Upload Section -->

                        <div class="row">
                            <div class="col">
                                <label>الصوره</label>
                                <input type="file" name="FilenameMany[]" id="image_updload" multiple accept="image/*"
                                       class="file-input-overview">
                            </div>
                        </div>
                        <!-- Product Information -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">معلومات المنتج</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="product-name-ar" class="form-label">اسم المنتج بالغه
                                                العربيه</label>
                                            <input type="text" id="product-name-ar" required name="name_ar"
                                                   class="form-control" placeholder="اسم المنتج بالغه العربيه">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="product-name-en" class="form-label">اسم المنتج بالغه
                                                الإنجليزية</label>
                                            <input type="text" id="product-name-en" required name="name_en"
                                                   class="form-control" placeholder="اسم المنتج بالغه الإنجليزية">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>رابط فديو</label>
                                            <input type="url" class="form-control" name="columns[video]">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="product-categories" class="form-label">الفئات</label>
                                        <select class="form-control" required id="product-categories" data-choices
                                                data-choices-groups data-placeholder="Select Categories"
                                                name="category_id">
                                            <option value="" disabled selected>-- أختر من القائمه --</option>
                                            @foreach(QueryModelsAll('Category')->get() as $row)
                                                <option value="{{$row->id}}">{{$row->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="product-brand" class="form-label">ماركة</label>
                                            <select class="form-control" required id="product-brand" data-choices
                                                    data-choices-groups data-placeholder="Select Brand" name="brand_id">
                                                <option value="" disabled selected>-- أختر من القائمه --</option>
                                                @foreach(QueryModelsAll('Brand')->get() as $row)
                                                    <option value="{{$row->id}}">{{$row->name_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Size and Color Options -->
                                <div class="row mb-4">
                                    <div class="col-lg-4">
                                        <div class="mt-3">
                                            <h5 class="text-dark fw-medium">مقاس :</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach(QueryModelsAll('Size')->get() as $row)
                                                    <input type="checkbox" class="btn-check" value="{{$row->id}}"
                                                           name="size[]" id="size-{{$row->id}}">
                                                    <label
                                                        class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                        for="size-{{$row->id}}">{{$row->name}}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="mt-3">
                                            <h5 class="text-dark fw-medium">الألوان :</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach(QueryModelsAll('Color')->get() as $row)
                                                    <input type="checkbox" class="btn-check" value="{{$row->id}}"
                                                           name="color[]" id="color-{{$row->id}}">
                                                    <label
                                                        class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center"
                                                        for="color-{{$row->id}}">
                                                        <i class="bx bxs-circle fs-18"
                                                           style="color: {{ $row->name }};"></i>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text Areas for Descriptions and Notes -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="short_description" class="form-label">وصف قصير للمنتج</label>
                                            <textarea required class="form-control bg-light-subtle"
                                                      id="short_description" rows="7" name="short_description"
                                                      placeholder="وصف قصير للمنتج"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">وصف المنتج</label>
                                            <textarea required class="form-control bg-light-subtle" id="description"
                                                      rows="7" name="description" placeholder="وصف المنتج"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="notes" class="form-label">ملاحظات المنتج</label>
                                            <textarea required class="form-control bg-light-subtle" id="notes" rows="7"
                                                      name="notes" placeholder="ملاحظات المنتج"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- SKU, Quantity, and Tags -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="product-id" class="form-label">رمز التعريفي للمنتج</label>
                                            <input type="number" required name="SKU" id="product-id"
                                                   class="form-control" placeholder="#******">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="product-stock" class="form-label">كمية</label>
                                            <input type="number" required name="quantity" id="product-stock"
                                                   class="form-control" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="choices-multiple-remove-button" class="form-label">الكلمات
                                            المفتاحية</label>
                                        <select class="form-control" required id="choices-multiple-remove-button"
                                                data-choices data-choices-removeItem name="tags[]" multiple>
                                            @foreach(QueryModelsAll('Tag')->get() as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Details -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">تفاصيل السعر</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="product-price" class="form-label">السعر</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                            <input type="number" required name="price" id="product-price"
                                                   class="form-control" placeholder="000">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="product-discount" class="form-label">قيمه الخصم</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text fs-20"><i class='bx bxs-discount'></i></span>
                                            <input type="number" required name="discount" id="product-discount"
                                                   class="form-control" placeholder="000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">اضافه منتج جديد
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('dash/vendor/boorstarp-fileUpdload/js/plugins/piexif.min.js')}}"></script>
    <script src="{{asset('dash/vendor/boorstarp-fileUpdload/js/plugins/sortable.min.js')}}"></script>
    <script src="{{asset('dash/vendor/boorstarp-fileUpdload/js/fileinput.min.js')}}"></script>
    <script src="{{asset('dash/vendor/boorstarp-fileUpdload/themes/fa5/theme.min.js')}}"></script>
    <script>
        $(function () {
            $("#image_updload").fileinput({
                theme: "fa5",
                maxFileCount: 20,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });
        });
    </script>
@endsection




