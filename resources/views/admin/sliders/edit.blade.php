@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    تعديل البيانات
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    تعديل البيانات
                </div>
                <div class="card-body">
                    <form action="{{route('sliders.update','test')}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id" value="{{$row->id}}">



                        <div class="row">
                            <div class="col">
                                <label class="mb-1">الاسم بالعربي</label>
                                <input type="text" name="title_ar" value="{{$row->title_ar}}" required class="form-control">
                            </div>

                            <div class="col">
                                <label class="mb-1">الاسم بالانجليزي</label>
                                <input type="text" name="title_en" value="{{$row->title_en}}" required class="form-control">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>الوصف بالعربي</label>
                                <textarea type="text" class="form-control ckeditor" style="height: 300px;" name="description_ar" required>
                                    {{$row->description_ar}}
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>الوصف بالانجليزي</label>
                                <textarea type="text" class="form-control ckeditor" style="height: 300px;" name="description_en" required>
                                    {{$row->description_en}}
                                </textarea>
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col">
                                <label>الصوره</label>
                                @if($row->photo)
                                    <input type="hidden"  value="{{$row->photo}}" name="old_file">
                                    <img src="{{asset('storage/sliders/'.$row->photo)}}" width="100px" height="100px" alt="">
                                @endif
                                <input type="file" name="photo" id="imageInput"  accept="image/*">

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




