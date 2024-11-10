@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    الكوبنات
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('coupons.create')}}" class="btn btn-success btn-sm">اضافه</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">

                    <table id="example" class="table table-hover table-centered table-bordered ">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">الكود</th>
                            <th scope="col">نوع الخصم</th>
                            <th scope="col"> الخصم</th>
                            <th scope="col"> الحد الاقصي للاستخدام</th>
                            <th scope="col"> عدد المستخدمين</th>
                            <th scope="col">الحاله</th>
                            <th scope="col">تاريخ بدايه</th>
                            <th scope="col">تاريخ نهايه</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->code}} </td>
                                <td>{{$row->discount_type}} </td>
                                <td>{{$row->discount_value}} </td>
                                <td>{{$row->max_used}} </td>
                                <td>{{$row->times_used}} </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input"
                                               onchange="toggleStatus({{$row->id}}, this.checked ? '1' : '0')"
                                               type="checkbox"
                                               id="flexSwitchCheckDefault{{$row->id}}" {{$row->status == '1' ? 'checked' : ''}}>

                                        <label class="form-check-label" for="flexSwitchCheckDefault{{$row->id}}">
                                            <i id="statusIcon{{$row->id}}"
                                               class="fa {{$row->status == '1' ? 'fa-toggle-on' : 'fa-toggle-off'}}"
                                               style="cursor: pointer;"
                                               onclick="toggleStatus({{$row->id}}, '{{$row->status}}')"></i>
                                        </label>
                                        <span id="statusText{{$row->id}}"
                                              style="font-size: 13px">{{$row->status == '1' ? 'نشط' : 'غير نشط'}} </span>
                                    </div>
                                </td>






                                <td>{{$row->start_date}}</td>
                                <td>{{$row->end_date}}</td>
                                <td>
                                    <a href="{{route('coupons.edit',$row->id)}}" class="btn btn-info btn-sm">تعديل</a>
                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                       data-bs-target="#DeletedModal{{$row->id}}">حذف</a>
                                </td>
                                @include('admin.coupons.deleted')

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

    <script>
        function toggleStatus(id, currentStatus) {

            var newStatus = currentStatus === '1' ? '1' : '0';


            $.ajax({
                url: "{{ route('status_coupons') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                data: {
                    active: newStatus,
                    id: id
                },
                success: function (response) {
                    var statusIcon = document.getElementById('statusIcon' + id);
                    var statusText = document.getElementById('statusText' + id);
                    var checkbox = document.getElementById('flexSwitchCheckDefault' + id);

                    if (newStatus === '1') {
                        statusIcon.classList.remove('fa-toggle-off');
                        statusIcon.classList.add('fa-toggle-on');
                        statusText.textContent = 'نشط';
                        checkbox.checked = true;
                    } else {
                        statusIcon.classList.remove('fa-toggle-on');
                        statusIcon.classList.add('fa-toggle-off');
                        statusText.textContent = 'غير نشط';
                        checkbox.checked = false;
                    }

                    Swal.fire({
                        icon: 'success',
                        title: 'نجاح!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ!',
                        text: 'حدث خطأ أثناء تحديث الحالة',
                    });
                }
            });
        }


    </script>
@endsection




