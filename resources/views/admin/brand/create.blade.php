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
                    <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

               

                        <div class="row">
                            <div class="col">
                                <label class="mb-1">الاسم بالعربي</label>
                                <input type="text" name="name_ar" required class="form-control">
                            </div>

                            <div class="col">
                                <label class="mb-1">الاسم بالانجليزي</label>
                                <input type="text" name="name_en" required class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>الوصف</label>
                                <textarea type="text" class="form-control" style="height: 300px;" name="description" required></textarea>
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col">
                                <label>الصوره</label>
                                <input type="file" name="image" id="imageInput" required accept="image/*">
                                <div class="image-preview-container">
                                    <div class="loading-spinner" id="loadingSpinner"></div>
                                    <img id="imagePreview" width="100px" height="100px" class="image-preview" src="#" alt="معاينة الصورة">
                                </div>
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
        document.getElementById('imageInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                var imagePreview = document.getElementById('imagePreview');
                var loadingSpinner = document.getElementById('loadingSpinner');

                reader.onloadstart = function() {
                    loadingSpinner.style.display = 'block';
                    imagePreview.style.display = 'none';
                };

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    loadingSpinner.style.display = 'none';
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection




