@extends('admin.layouts.master')
@section('title')
    orders
@endsection
@section('css')
@endsection


@section('content')

    <div class="card basic-data-table">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
            <form action="{{ route('admin_orders.index') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col">
                        <label>Order Numbers</label>
                        <input type="text" class="form-control" name="order_numbers" value="{{ request('order_numbers') }}">
                    </div>

                    <div class="col">
                        <label>Status Order</label>
                        <select class="form-control" name="status_orders">
                            <option value="">-- Choose Status Orders --</option>
                            <option value="pending" {{ request('status_orders') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ request('status_orders') == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ request('status_orders') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('status_orders') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="refunded" {{ request('status_orders') == 'refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </div>

                    <div class="col">
                        <label>Type Order</label>
                        <select class="form-control" name="type_orders">
                            <option value="">-- Choose Type Orders --</option>
                            <option value="orders" {{ request('type_orders') == 'orders' ? 'selected' : '' }}>Orders</option>
                            <option value="gift" {{ request('type_orders') == 'gift' ? 'selected' : '' }}>Gift</option>
                        </select>
                    </div>

                    <div class="col">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{ request('phone_number') }}">
                    </div>

                    <div class="col">
                        <button class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
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
                        <th scope="col">order number</th>
                        <th scope="col">order type</th>
                        <th scope="col">customer</th>
                        <th scope="col">Status</th>
                        <th scope="col">Create Order</th>
                        <th scope="col">total</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>
                                <a style="color: #0A51CE" href="{{route('admin_orders/details',$row->order_number)}}" target="_blank">{{ $row->order_number }}</a>
                            </td>

                            <td>
                                {!!  $row->getOrderTypeColor() !!}
                            </td>


                            <td>
                                {{ $row->customer_id ? $row->customer->name() : 'no customer' }}
                            </td>



                            <td>
                                {!!  $row->getStatusColor() !!}
                            </td>

                            <td>
                                {{$row->created_at->format('Y-m-d')}}
                            </td>
                            <td>
                                {{$row->total}}
                            </td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{route('admin_orders/details',$row->order_number)}}">Orders Details</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}">Orders Status</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

@include('admin.orders.changeStatus')
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
