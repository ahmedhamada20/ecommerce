@extends('admin.layouts.master')
@section('title')
    Edit
@endsection
@section('css')
@endsection


@section('content')

    <div class="card basic-data-table">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" id="error-alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('error-alert').style.display = 'none';
                    }, 20000);

                </script>
            @endif


            <form action="{{route('admin_categories.update','test')}}" method="post"  enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" value="{{$data->id}}" name="id">


                <div class="mb-3">
                    <label for="orderNumber" class="form-label">name Ar</label>
                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{$data->name_ar}}" required>
                </div>
                <div class="mb-3">
                    <label for="orderNumber" class="form-label">name En</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{$data->name_en}}" required>
                </div>

                <div class="mb-3">
                    <label for="orderNumber" class="form-label">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{$data->slug}}" required>
                </div>


                <div class="mb-3">
                    <label for="details" class="form-label">description Ar</label>
                    <textarea id="editor" class="form-control" name="description_ar" rows="4"
                              placeholder="description Ar...">{{$data->description_ar}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label">description En</label>
                    <textarea id="editor2" class="form-control" name="description_en" rows="4"
                              placeholder="description En">{{$data->description_en}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label">parent</label>
                    <select class="form-control" name="parent_id">
                        <option value="" disabled selected>-- Choose --</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$data->parent_id == $category->id ? 'selected':null}}>{{$category->name()}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label for="evidence" class="form-label">Imges</label>
                    <input type="file" class="form-control" id="evidence" name="image" accept="image/*">
                    @if($data->photo)
                        <img src="{{asset('storage/'.$data->photo->filename)}}" width="50px" height="50px" alt="">
                    @endif
                </div>

                <div class="mb-3">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>

        </div>
    </div>
@endsection


@section('js')

@endsection
