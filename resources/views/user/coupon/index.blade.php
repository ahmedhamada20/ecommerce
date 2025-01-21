@extends('user.layouts.master')
@section('title')
    Counps
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
                        <th scope="col">code</th>
                        <th scope="col">type code</th>
                        <th scope="col">start date </th>
                        <th scope="col">end date </th>
                        <th scope="col">discount value</th>
                        <th scope="col">discount type</th>
                        <th scope="col">Orders</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>
                               {{$row->code}}
                            </td>

                            <td>
                               {{$row->type_code()}}
                            </td>


                            <td>
                                {{$row->start_date}}
                            </td>
                            <td>
                                {{$row->end_date}}
                            </td>
                            <td>
                                {{$row->discount_value}}
                            </td>

                            <td>
                                {{$row->discount_type}}
                            </td>

                            <td>
                                <a style="color: #0A51CE" href="{{route('user_coupon_order',$row->code)}}" target="_blank">Orders</a>

                            </td>

                        </tr>


                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
