@extends('admin.layouts.master')
@section('css')
@endsection

@section('title')
    تعليقات المقال
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between text-start">
                        <div class="col-lg-3">
                            <h2>  تعليقات المنتج  :: {{ $data->name_ar }}</h2>

                        </div>
                        <div class="col-lg-5 text-start">
                            <a href="{{route('blogs.index')}}" class="btn btn-info">صفحه المقالات</a>
                        </div>
                    </div>
                </div>


                <div class="card-body">

                    <table id="example" class="table table-hover table-centered table-bordered ">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">التعليق</th>
                                <th scope="col">اسم المستخدم</th>
                                <th scope="col">عدد النجوم</th>
                                <th scope="col">نشط</th>
                                <th scope="col">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->commentable as $row)
                                <tr>
                                    <td>
                                        <span id="notePreview{{ $row->id }}">
                                            {{ Str::limit($row->note, 50) }}
                                            @if (strlen($row->note) > 50)
                                                <a href="javascript:void(0);"
                                                    onclick="showFullNote({{ $row->id }})">...</a>
                                            @endif
                                        </span>
                                        <span id="fullNote{{ $row->id }}" style="display: none;">
                                            {{ $row->note }}
                                        </span>
                                    </td>

                                    <td>{{ $row->customer->name }}</td>
                                    <td>{{ $row->value }}</td>

                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input"
                                                onchange="toggleStatus({{ $row->id }}, this.checked ? '1' : '0')"
                                                type="checkbox" id="flexSwitchCheckDefault{{ $row->id }}"
                                                {{ $row->status == '1' ? 'checked' : '' }}>

                                            <label class="form-check-label" for="flexSwitchCheckDefault{{ $row->id }}">
                                                <i id="statusIcon{{ $row->id }}"
                                                    class="fa {{ $row->status == '1' ? 'fa-toggle-on' : 'fa-toggle-off' }}"
                                                    style="cursor: pointer;"
                                                    onclick="toggleStatus({{ $row->id }}, '{{ $row->status }}')"></i>
                                            </label>
                                            <span id="statusText{{ $row->id }}"
                                                style="font-size: 13px">{{ $row->status == '1' ? 'نشط' : 'غير نشط' }}
                                            </span>
                                        </div>
                                    </td>

                                    <td>
                                        <button class="btn btn-danger   " href="#" data-bs-toggle="modal" data-bs-target="#DeletedModal{{$row->id}}">حذف</button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="DeletedModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Cairo', sans-serif;">حذف</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('blogs_deleted_comment')}}" method="post" autocomplete="off">
                                                    @csrf


                                                    <input type="hidden" value="{{$row->id}}" name="id">


                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="text-red">هل أنت متأكد من عمليه الحذف ؟؟</label>
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

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
            url: "{{ route('status_cemment_blogs') }}",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: {
                publish: newStatus,
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

    <script>
        function showFullNote(id) {
            document.getElementById('notePreview' + id).style.display = 'none';
            document.getElementById('fullNote' + id).style.display = 'inline';
        }
    </script>
@endsection
