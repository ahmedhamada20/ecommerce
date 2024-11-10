@extends('admin.layouts.master')
@section('css')

    <link href="{{ asset('dash/vendor/boorstarp-fileUpdload/css/fileinput.css') }}" rel="stylesheet">

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
                    <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">
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
                                <label>وصف قصير بالعربي</label>
                                <textarea type="text" class="form-control ckeditor" style="height: 300px;" name="short_description_ar" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label>وصف قصير بالانجليزي</label>
                                <textarea type="text" class="form-control ckeditor" style="height: 300px;" name="short_description_en" required></textarea>
                            </div>
                        </div>


                        <br>

                        <div class="row">
                            <div class="col">
                                <label>الوصف بالعربي</label>
                                <textarea type="text" class="form-control ckeditor" style="height: 300px;" name="description_ar" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label>الوصف بالانجليزي</label>
                                <textarea type="text" class="form-control ckeditor" style="height: 300px;" name="description_en" required></textarea>
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col">
                                <label>الصوره</label>
                                <input type="file" name="image" id="imageInput" required accept="image/*">
                                <div class="image-preview-container">
                                    <div class="loading-spinner" id="loadingSpinner"></div>
                                    <img id="imagePreview" width="100px" height="100px" class="image-preview" src="{{asset('16d54edd-3318-4af5-8d26-9b03488b1606.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>الصوره</label>
                                <input type="file" name="FilenameMany[]" id="image_updload" multiple accept="image/*"
                                       class="file-input-overview">
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

    <script src="{{ asset('dash/vendor/boorstarp-fileUpdload/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('dash/vendor/boorstarp-fileUpdload/js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('dash/vendor/boorstarp-fileUpdload/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('dash/vendor/boorstarp-fileUpdload/themes/fa5/theme.min.js') }}"></script>

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

    <script>
        $(function() {
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




