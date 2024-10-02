@extends('admin.layouts.master')
@section('css')

@endsection

@section('title')
    الاعدادات الاساسية
@endsection

@section('content')

    <div class="row">
        <form action="{{route('admin.setting_update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id ?? null}}">

            <div class="row">
                <div class="col">
                    <label>الاسم</label>
                    <input type="text" class="form-control" name="columns[name]"
                           value="{{ isset($data->columns) ? json_decode($data->columns)->name : '' }}" required>
                </div>

                <div class="col">
                    <label>رقم الهاتف</label>
                    <input type="number" class="form-control" name="phone" value="{{ $data->phone ?? '' }}" required>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label>الوصف</label>

                    <textarea  type="text" class="form-control" style="height: 300px;"
                              name="columns[notes]">
                        {{ isset($data->columns) ? json_decode($data->columns)->notes : '' }}
                    </textarea>


                </div>

            </div>


            <br>

            <div class="row">
                <div class="col">
                    <button class="btn btn-success">تعديل</button>
                </div>
            </div>


        </form>
    </div>

@endsection

@section('js')

@endsection




