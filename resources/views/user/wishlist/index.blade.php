@extends('user.layouts.master')
@section('title')
    wishlist
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
                                <a class="btn btn-success btn-sm ml-2"   href="{{ route('shop_details', app()->getLocale() === 'ar' ? $row->product->slug_ar : $row->product->slug_en) }}" target="_blank">product</a>
                                <a href="{{route('delete_wishlists',$row->product->id)}}" class="btn btn-danger btn-sm mr-3">Deleted</a>

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
