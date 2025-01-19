@extends('admin.layouts.master')
@section('title')
    permissions
@endsection
@section('css')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">اضافة صلاحية جديدة</button>
                        @include('admin.permissions.create')
                    </h4><br>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                                        <thead>
                                        <tr>
                                            <th scope="col">name</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($permissions as $role)
                                            <tr>
                                                <td>
                                                    {{ $role->name }}
                                                </td>

                                                <td>

                                                    <a href="javascript:void(0)"
                                                       data-bs-toggle="modal" data-bs-target="#edit{{$role->id}}"
                                                       class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                       data-bs-toggle="modal" data-bs-target="#delete{{$role->id}}"
                                                       class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                                    </a>
                                                </td>
                                            </tr>
                                            @include('admin.permissions.edit')
                                            @include('admin.permissions.destroy')
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

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
