@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    اضافه جديده
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    اضافه جديده
                </div>
                <div class="card-body">
                    <form action="{{route('coupons.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label class="mb-1">الكود</label>
                                <input type="text" name="code" required class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label class="mb-1">نوع الخصم</label>
                                <select class="form-control" name="discount_type" required>
                                    <option value="" disabled selected>-- أختر من القائمه --</option>
                                    <option value="cash">كاش</option>
                                    <option value="relative">نسبه مئويه</option>
                                </select>
                            </div>


                            <div class="col">
                                <label>الخصم</label>
                                <input type="number" class="form-control" name="discount_value" required>
                            </div>

                        </div>


                        <br>
                        <div class="row">
                            <div class="col">
                                <label>حد اقصي للمستخدمين</label>
                                <input type="number" class="form-control" name="max_used" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label>تاريخ البدايه</label>
                                <input type="date" class="form-control" required name="start_date">
                            </div>


                            <div class="col">
                                <label>تاريخ النهايه</label>
                                <input type="date" class="form-control" required name="end_date">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">حفظ</button>
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
        document.getElementById('imageInput').addEventListener('change', function (event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                var imagePreview = document.getElementById('imagePreview');
                var loadingSpinner = document.getElementById('loadingSpinner');

                reader.onloadstart = function () {
                    loadingSpinner.style.display = 'block';
                    imagePreview.style.display = 'none';
                };

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    loadingSpinner.style.display = 'none';
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection




