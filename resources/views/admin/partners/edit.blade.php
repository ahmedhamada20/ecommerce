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
                    <form action="{{route('partners.update','test')}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id" value="{{$row->id}}">



                        <br>


                        <div class="row">
                            <div class="col">
                                <label>الصوره</label>
                                @if($row->photo)
                                    <input type="hidden" value="{{$row->photo}}" name="old_file">
                                    <img src="{{asset('storage/partners/'.$row->photo)}}" width="100px" height="100px" alt="">
                                @endif
                                <input type="file" name="image" id="imageInput"  accept="image/*">

                                <div class="image-preview-container">
                                    <div class="loading-spinner" id="loadingSpinner"></div>
                                    <img id="imagePreview" width="100px" height="100px" class="image-preview" src="{{asset('16d54edd-3318-4af5-8d26-9b03488b1606.jpg')}}" alt="">
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




