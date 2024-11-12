@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    جميع المستخدمين
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <table id="example" class="table table-hover table-centered table-bordered ">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">اسم المستخدم</th>
                            <th scope="col">البريد الالكتروني</th>
                            <th scope="col">رقم الهاتف</th>
                            <th scope="col">حاله الحساب</th>
                            <th scope="col">عدد الطلبات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
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
                                <td>{{$row->orders_count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-links">
                        {{ $data->links() }}
                    </div>
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
                url: "{{ route('status_customers') }}",
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




