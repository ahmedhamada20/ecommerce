@extends('admin.layouts.master')
@section('title')
    users
@endsection
@section('css')
@endsection


@section('content')

    <div class="card basic-data-table">

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" id="error-alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('error-alert').style.display = 'none';
                    }, 20000);

                </script>
            @endif

            <div class="table-responsive">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                    <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">phone</th>
                        <th scope="col">phone whatsapp</th>
                        <th scope="col">count Orders</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>
                                {{ $row->name() }}
                            </td>
                            <td>
                                {{ $row->phone }}
                            </td>

                            <td>
                                {{ $row->whatsapp_phone }}
                            </td>
                            <td>
                                {{ $row->orders()->count() }}
                            </td>
                            <td>
                                <div class="form-switch switch-success d-flex align-items-center gap-3">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           role="switch"
                                           id="flexSwitchCheckDefault{{$row->id}}"
                                           {{$row->is_active == '1' ? 'checked' : ''}}
                                           onchange="toggleStatus({{$row->id}}, this.checked ? '1' : '0')">

                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                           for="flexSwitchCheckDefault{{$row->id}}">
                                        <span
                                            id="statusText{{$row->id}}">{{$row->is_active == '1' ? 'active' : 'inActive'}}</span>
                                    </label>
                                </div>
                            </td>

                            <td>
                                {{--                                <a href="javascript:void(0)"--}}
                                {{--                                   class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">--}}
                                {{--                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>--}}
                                {{--                                </a>--}}
                                <a href="javascript:void(0)"
                                   data-bs-toggle="modal" data-bs-target="#disputeModalEdit{{$row->id}}"
                                   class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                   data-bs-toggle="modal" data-bs-target="#deleted{{$row->id}}"
                                   class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        @include('admin.users.edit')
{{--                        @include('admin.users.deleted')--}}
                    @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>


@endsection


@section('js')
    <script>
        function toggleStatus(id, currentStatus) {
            var newStatus = currentStatus === '1' ? '1' : '0';
            $.ajax({
                url: "{{ route('admin_updateCountryStatus') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                data: {
                    active: newStatus,
                    id: id
                },
                success: function (response) {
                    var statusText = document.getElementById('statusText' + id);
                    var checkbox = document.getElementById('flexSwitchCheckDefault' + id);

                    if (newStatus === '1') {
                        statusText.textContent = 'active';
                        checkbox.checked = true;
                    } else {
                        statusText.textContent = 'inActive';
                        checkbox.checked = false;
                    }
                    alert('The status has been changed successfully');
                },
                error: function () {
                    alert('Something went wrong, please try again.');
                }
            });
        }


    </script>
@endsection
