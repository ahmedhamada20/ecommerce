@extends('admin.layouts.master')
@section('title')
Home
@endsection
@section('css')
@endsection

@section('content')
<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Users</p>
                        <h6 class="mb-0">{{get_count(model: 'user')->where('type', 'customer')->count()}}</h6>
                    </div>
                    <div
                        class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>

            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Subscription</p>
                        <h6 class="mb-0">{{get_count('Coupon')->whereNotNull('customer_id')->count()}}</h6>
                    </div>
                    <div
                        class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fa-solid:award" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>

            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Orders</p>
                        <h6 class="mb-0">{{get_count('Order')->sum('total')}}</h6>
                    </div>
                    <div
                        class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fluent:people-20-filled" class="text-white text-2xl mb-0"></iconify-icon>
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
                        <p class="fw-medium text-primary-light mb-1">Total Order Success</p>
                        <h6 class="mb-0">${{get_count('Order')->where('status', 'completed')->sum('total')}}</h6>
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
                        <h6 class="mb-0">${{get_count('Order')->where('status', 'pending')->sum('total')}}</h6>
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

<br>

<hr>

<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
      

    <div class="col">
        <div class="card shadow-none border bg-gradient-start-4 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">count Order Success</p>
                        <h6 class="mb-0">{{get_count('Order')->where('status', 'completed')->count()}}</h6>
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
                        <h6 class="mb-0">{{get_count('Order')->where('status', 'processing')->count()}}</h6>
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
                        <h6 class="mb-0">{{get_count('Order')->where('status', 'cancelled')->count()}}</h6>
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
                        <h6 class="mb-0">{{get_count('Order')->where('status', 'refunded')->count()}}</h6>
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
                        <h6 class="mb-0">{{get_count('Order')->where('status', 'pending')->count()}}</h6>
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

<br>
<hr>
<div class="row gy-4 mt-1">


    <div class="col-xxl-9 col-xl-12">
        <div class="card h-100">
            <div class="card-body p-24">

                <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                    <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center active" id="pills-to-do-list-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-to-do-list" type="button" role="tab"
                                aria-controls="pills-to-do-list" aria-selected="true">
                                Latest Registered
                                <span
                                    class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">
                                    {{ \App\Models\User::where('type', 'customer')->orderByDesc('id')->count() }}
                                </span>

                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center" id="pills-recent-leads-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-recent-leads" type="button" role="tab"
                                aria-controls="pills-recent-leads" aria-selected="false" tabindex="-1">
                                Latest Orders
                                <span
                                    class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">
                                    {{ \App\Models\Order::where('status', 'completed')->orderByDesc('id')->take(10)->get()->count() }}
                                </span>
                            </button>
                        </li>
                    </ul>
                   
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-to-do-list" role="tabpanel"
                        aria-labelledby="pills-to-do-list-tab" tabindex="0">
                        <div class="table-responsive scroll-sm">
                            <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Users </th>
                                        <th scope="col">Registered On</th>

                                        <th scope="col" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (get_count('User')->where('type', 'customer')->orderByDesc('id')->get() as $row)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://laravel.wowdash.wowtheme7.com/assets/images/users/user1.png"
                                                        alt=""
                                                        class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                    <div class="flex-grow-1">
                                                        <h6 class="text-md mb-0 fw-medium">{{$row->name()}}</h6>
                                                        <span
                                                            class="text-sm text-secondary-light fw-medium">{{$row->email}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$row->created_at->format('Y-m-d')}}</td>

                                            <td class="text-center">
                                                <span
                                                    class="bg-{{ $row->is_active == 1 ? 'success' : 'danger' }}-focus text-{{ $row->is_active == 1 ? 'success' : 'danger' }}-main px-24 py-4 rounded-pill fw-medium text-sm">
                                                    {{ $row->is_active == 1 ? 'Active' : 'NoActive' }}
                                                </span>
                                            </td>

                                        </tr>

                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-recent-leads" role="tabpanel"
                        aria-labelledby="pills-recent-leads-tab" tabindex="0">
                        <div class="table-responsive scroll-sm">
                            <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Order Id </th>
                                        <th scope="col">Total Price</th>

                                        <th scope="col" class="text-center">View Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (get_count('Order')->where('status', 'completed')->orderByDesc('id')->take('10')->get() as $row)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://laravel.wowdash.wowtheme7.com/assets/images/users/user1.png"
                                                        alt=""
                                                        class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                    <div class="flex-grow-1">
                                                        <h6 class="text-md mb-0 fw-medium">{{$row->customer->name()}}</h6>
                                                        <span
                                                            class="text-sm text-secondary-light fw-medium">{{$row->customer->email}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a style="color: #0A51CE" href="{{route('admin_orders/details',$row->order_number)}}" target="_blank">{{ $row->order_number }}</a>
                                            </td>
                                            <td>{{$row->total}}</td>

                                            <td class="text-center">
                                                <span
                                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">{!!$row->getStatusColor()!!}</span>
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="mb-2 fw-bold text-lg mb-0">Best Selling Products</h6>
                                   
                </div>

                <div class="mt-32">

                    @foreach (get_category_products_lastes() as $row)
                    <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $row?->photo?->filename) }}" alt=""
                                class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                            <div class="flex-grow-1">
                                <h6 class="text-md mb-0 fw-medium">{{$row->name()}}</h6>
                                <span class="text-sm text-secondary-light fw-medium">Agent ID: {{$row->SKU}}</span>
                            </div>
                        </div>
                        <span class="text-primary-light text-md fw-medium">${{$row->price}}</span>
                    </div>

                    @endforeach
                    

                </div>

            </div>
        </div>
    </div>



</div>

<br>
<hr>

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
                    @foreach(get_count('Order')->orderByDesc('id')->take(50)->get() as $row)
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