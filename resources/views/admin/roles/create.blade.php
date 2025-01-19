@extends('admin.layouts.master')
@section('title')
    roles
@endsection
@section('css')

@endsection


@section('content')

    <div class="card basic-data-table">
        <div class="card-body">
            <form action="{{route('admin_roles.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="inputEmail4">إسم الدور<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="inputEmail4">
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-4">
                                <h4>Assign Permissions</h4>


                                <div class="permissions-list">
                                    @foreach($permissions as $permission)
                                        <div class="permission-item mb-3 p-3 border border-primary rounded bg-light">
                                            <label class="d-flex align-items-center gap-2">
                                                <input type="checkbox" name="permission[]" value="{{$permission->id}}" class="form-check-input" id="permission{{$permission->id}}">
                                                <span class="text-dark">{{$permission->name}}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">تاكيد</button>
            </form>

        </div>
    </div>


@endsection


