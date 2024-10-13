@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    الاحجام
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">اضافه</button>
{{--                            <button class="btn btn-info btn-sm"> تنزيل اكسل</button>--}}
{{--                            <button class="btn btn-indigo btn-sm"> طباعه</button>--}}
                            @include('admin.sizes.create')
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <table id="example" class="table table-hover table-centered table-bordered ">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">الحجم</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>
                                   {{$row->name}}
                                </td>

                                <td>
                                    <a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#EditModal{{$row->id}}">تعديل</a>
                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#DeletedModal{{$row->id}}">حذف</a>
                                </td>
                                @include('admin.sizes.edit')
                                @include('admin.sizes.deleted')
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')


@endsection




