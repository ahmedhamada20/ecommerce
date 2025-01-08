@extends('admin.layouts.master')
@section('title')
    Edit blogs
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
                    setTimeout(function () {
                        document.getElementById('error-alert').style.display = 'none';
                    }, 20000);

                </script>
            @endif

            <form action="{{route('admin_blogs.update','test')}}" method="post" autocomplete="off"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" value="{{$row->id}}" name="id">

                <div class="mb-3">
                    <label for="orderNumber" class="form-label">name Ar</label>
                    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{$row->name_ar}}" required>
                </div>
                <div class="mb-3">
                    <label for="orderNumber" class="form-label">name En</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{$row->name_en}}" required>
                </div>
                <div class="mb-3">
                    <label for="orderNumber" class="form-label">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{$row->slug}}" required>
                </div>


                <div class="mb-3">
                    <label for="details" class="form-label"> short description Ar</label>
                    <textarea id="editor" class="form-control" name="short_description_ar" rows="4"
                              placeholder="short description Ar...">{{$row->short_description_ar}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="details" class="form-label"> short description En</label>
                    <textarea id="editor" class="form-control" name="short_description_en" rows="4"
                              placeholder="short description EN...">{{$row->short_description_en}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label">description Ar</label>
                    <textarea id="editor" class="form-control" name="description_ar" rows="4"
                              placeholder="description Ar...">{{$row->description_ar}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label">description En</label>
                    <textarea id="editor2" class="form-control" name="description_en" rows="4"
                              placeholder="description En">{{$row->description_en}}</textarea>
                </div>


                <div class="mb-3">
                    <label for="details" class="form-label">notes Ar</label>
                    <textarea id="editor" class="form-control" name="notes_ar" rows="4"
                              placeholder="notes Ar...">{{$row->notes_ar}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label">notes En</label>
                    <textarea id="editor2" class="form-control" name="notes_en" rows="4"
                              placeholder="notes En">{{$row->notes_en}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="evidence" class="form-label">Imges</label>
                    <input type="file" class="form-control" id="evidence" name="image" accept="image/*">
                    @if($row->photo)
                        <img src="{{asset('storage/'.$row->photo->filename)}}" width="50px" height="50px" alt="">
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
