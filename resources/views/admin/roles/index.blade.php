@extends('admin.layouts.master')
@section('title')
    roles
@endsection
@section('css')
@endsection


@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{route('admin_roles.create')}}" class="btn btn-primary waves-effect waves-light" role="button" aria-pressed="true" >اضافة دور جديد</a>
                    </h4><br>
                    <table id="datatable" data-page-length="50" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الدور</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#show_role{{$role->id}}" class="btn btn-warning btn-sm waves-effect waves-light">
                                    <i class="bx bx-zoom-in font-size-16 align-middle me-2"></i> عرض
                                </button>
                                    <a href="{{route('admin_roles.edit',$role->id)}}" class="btn btn-success btn-sm waves-effect waves-light" role="button" title="تعديل" aria-pressed="true"><i class="bx bx-check-double font-size-16 align-middle me-2"></i> تعديل</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#delete{{$role->id}}" class="btn btn-danger btn-sm waves-effect waves-light">
                                    <i class="bx bx-block font-size-16 align-middle me-2"></i> حذف
                                </button>
                            </td>
                        </tr>
                        @include('admin.roles.show')
                        @include('admin.roles.destroy')
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end row -->

@endsection

@section('js')



@endsection
