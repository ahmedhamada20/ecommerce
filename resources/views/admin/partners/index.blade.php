@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    الالوان
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('partners.create')}}" class="btn btn-success btn-sm">اضافه</a>

                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <table id="example" class="table table-hover table-centered table-bordered ">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">الصوره</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>
                                    <a href="{{asset('storage/partners/'.$row->photo)}}" target="_blank">
                                        <img src="{{asset('storage/partners/'.$row->photo)}}" width="100px"
                                             height="100px" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#EditModal{{$row->id}}">تعديل</a>
                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#DeletedModal{{$row->id}}">حذف</a>
                                </td>
                                @include('admin.partners.edit')
                                @include('admin.partners.deleted')
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




