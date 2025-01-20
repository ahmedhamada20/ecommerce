@extends('user.layouts.master')
@section('title')
    orders
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
                                <a style="color: #0A51CE" href="{{route('user_orders/details',$row->order_number)}}" target="_blank">{{ $row->order_number }}</a>
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
                                        <li><a class="dropdown-item" href="{{route('user_orders/details',$row->order_number)}}">Orders Details</a></li>
                                    </ul>
                                </div>
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
