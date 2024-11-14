@extends('admin.layouts.master')
@section('css')
@endsection

@section('title')
    اضافه صور لكل لون
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-8 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> اضافه صور لكل لون</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('add_image_color_products') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{ $data->id }}" name="id">

                        <div class="row">
                            <h5>اختر اللون وارفع الصور</h5>
                            @foreach($data->colors as $color)
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-2">
                                        <input type="checkbox" class="btn-check" value="{{ $color->id }}" name="colors[]"
                                               id="color-{{ $color->id }}" autocomplete="off"
                                               onchange="toggleQuantityAndImages({{ $color->id }})">
                                        <label class="btn btn-outline-primary d-flex justify-content-center align-items-center"
                                               for="color-{{ $color->id }}">
                                            <i class="bx bxs-circle fs-18" style="color: {{ $color->name }};"></i>
                                            {{ $color->name }}
                                        </label>
                                    </div>

                                    <!-- حقل الكمية الخاص بكل لون -->
{{--                                    <div class="col-lg-2">--}}
{{--                                        <input type="number" class="form-control quantity-input" name="quantities[]"--}}
{{--                                               id="quantity-{{ $color->id }}" placeholder="أدخل الكمية" min="1" disabled>--}}
{{--                                    </div>--}}

                                    <div class="col-lg-6">
                                        <input type="file" class="form-control image-input" name="images[{{ $color->id }}][]"
                                               id="images-{{ $color->id }}" accept="image/*" multiple disabled>
                                        <small class="text-muted">يمكنك رفع صور متعددة لهذا اللون</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <br>

                        <!-- زر الحفظ والتنقل -->
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <a href="{{ route('products.index') }}" class="btn btn-outline-purple w-100">
                                        الذهاب لعرض المنتجات
                                    </a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-info w-100">حفظ البيانات</button>
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
    <script>
        function toggleQuantityAndImages(colorId) {
            const isChecked = document.getElementById(`color-${colorId}`).checked;
            document.getElementById(`images-${colorId}`).disabled = !isChecked;
        }
    </script>
@endsection




