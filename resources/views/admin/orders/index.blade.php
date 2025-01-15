@extends('admin.layouts.master')
@section('title')
    orders
@endsection
@section('css')
@endsection


@section('content')

    <div class="card basic-data-table">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
            <a href="{{route('admin_orders.create')}}" class="btn btn-primary">
                Add new
            </a>
        </div>
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
                    setTimeout(function () {
                        document.getElementById('error-alert').style.display = 'none';
                    }, 20000);

                </script>
            @endif

            <div class="table-responsive">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                    <thead>
                    <tr>
                        <th scope="col">code</th>
                        <th scope="col">type code</th>
                        <th scope="col">customer</th>
                        <th scope="col">Status</th>
                        <th scope="col">discount value</th>
                        <th scope="col">discount type</th>
                        <th scope="col">max used</th>
                        <th scope="col">times used</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>
                                {{ $row->order_number }}
                            </td>
                            <td>
                                {!!  $row->getStatusColor() !!}
                            </td>
                            <td>
                                {{ $row->customer_id ? $row->customer->name() : 'no customer' }}
                            </td>
                            <td>
                                <div class="form-switch switch-success d-flex align-items-center gap-3">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           role="switch"
                                           id="flexSwitchCheckDefault{{$row->id}}"
                                           {{$row->status == '1' ? 'checked' : ''}}
                                           onchange="toggleStatus({{$row->id}}, this.checked ? '1' : '0')">

                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                           for="flexSwitchCheckDefault{{$row->id}}">
                                        <span
                                            id="statusText{{$row->id}}">{{$row->status == '1' ? 'active' : 'inActive'}}</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                {{ $row->discount_value }}
                            </td>
                            <td>
                                {{ $row->discount_type }}
                            </td>
                            <td>
                                {{ $row->max_used }}
                            </td>
                            <td>
                                {{ $row->times_used }}
                            </td>

                            <td>
                                <a href="{{route('admin_coupons.edit',$row->id)}}"
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
                url: "{{ route('admin_updateCouponStatus') }}",
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
