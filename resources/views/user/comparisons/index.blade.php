@extends('user.layouts.master')
@section('title')
    comparisons
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
                        <th scope="col">product name</th>
                        <th scope="col">product price</th>
                        <th scope="col">product quantity</th>

                        <th scope="col">view product</th>


                    </tr>
                    </thead>
                    <tbody>
                    @if($data)
                        @foreach($data as $row)
                            <tr>
                                <td>
                                    {{$row->product->name()}}
                                </td>
                                <td>
                                    {{$row->product->price}}
                                </td>
                                <td>
                                    {{$row->product->quantity}}
                                </td>
                                <td>
                                    <a style="color: #0A51CE" href="" target="_blank">product</a>

                                </td>

                            </tr>


                        @endforeach
                    @endif

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
