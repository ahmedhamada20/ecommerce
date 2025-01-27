@extends('user.layouts.master')
@section('title')
    Home
@endsection
@section('css')
@endsection
@section('content')
    <!-- ..::  breadcrumb  start ::.. -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="@if(auth()->check())
    {{ auth()->user()->type == "admin" ? route('admin_') : route('user_') }}
@else
    {{ route('home.index') }}
@endif
"
                   class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">User Panel</li>
        </ul>
    </div> <!-- ..::  header area end ::.. -->

    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
      

        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Order Success</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'completed')->where('customer_id',auth()->user()->id)->sum('total')}}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>

        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Order processing</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'processing')->where('customer_id',auth()->user()->id)->sum('total')}}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Order cancelled</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'cancelled')->where('customer_id',auth()->user()->id)->sum('total')}}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Order refunded</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'refunded')->where('customer_id',auth()->user()->id)->sum('total')}}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>

        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Order pending</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'pending')->where('customer_id',auth()->user()->id)->sum('total')}}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="fa6-solid:file-invoice-dollar"
                                class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>
    </div>

    <hr>
    <br>
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
      

        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">count Order Success</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'completed')->where('customer_id',auth()->user()->id)->count()}}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>

        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">count Order processing</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'processing')->where('customer_id',auth()->user()->id)->count()}}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">count Order cancelled</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'cancelled')->where('customer_id',auth()->user()->id)->count()}}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">count Order refunded</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'refunded')->where('customer_id',auth()->user()->id)->count()}}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>

        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Order pending</p>
                            <h6 class="mb-0">${{get_count('Order')->where('status', 'pending')->where('customer_id',auth()->user()->id)->count()}}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="fa6-solid:file-invoice-dollar"
                                class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
    
                </div>
            </div><!-- card end -->
        </div>
    </div>


    <hr>
    <br>

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
                        @foreach(get_count('Order')->where('customer_id',auth()->user()->id)->orderByDesc('id')->take(50)->get() as $row)
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
      
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
