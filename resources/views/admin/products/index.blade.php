@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    المنتجات
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('products.create')}}" class="btn btn-success btn-sm" >اضافه</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <table id="example" class="table table-hover table-centered table-bordered ">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">الاسم</th>
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




