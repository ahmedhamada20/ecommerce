@extends('admin.layouts.master')
@section('css')


@endsection

@section('title')
    الطلبات
@endsection

@section('content')
    <!-- Start Container Fluid -->
    <div class="container-xxl">

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Order Refund</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">{{count_orders('refund')}}</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:chat-round-money-broken"
                                                  class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Order Cancel</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">{{count_orders('canceled')}}</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:cart-cross-broken"
                                                  class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Order prepared</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">{{count_orders('prepared')}}</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:box-broken"
                                                  class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Order Delivering</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">{{count_orders('delivery')}}</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:tram-broken"
                                                  class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Pending</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">{{count_orders('cancelpendinged')}}</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:clipboard-remove-broken"
                                                  class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Order canceled</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">{{count_orders('canceled')}}</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:clock-circle-broken"
                                                  class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">قائمه الطلبات</h4>
                        </div>

                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-centered table-bordered ">
                                <thead class="bg-light-subtle">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Created at</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Payment Status</th>
                                    <th>Items</th>

                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->created_at->format('Y-m-d')}}</td>
                                        <td>
                                            <a href="#!" class="link-primary fw-medium">{{$row->customer->name}}</a>
                                        </td>
                                        <td> {{$row->total}}</td>
                                        <td><span
                                                class="badge bg-light text-dark  px-2 py-1 fs-13">{{$row->payment_status}}</span>
                                        </td>
                                        <td> {{$row->detailsOrders->count()}}</td>


                                        <td>
                                            @if($row->status == "completed")
                                                <span
                                                    class="badge border border-success text-success  px-2 py-1 fs-13">{{$row->status}}</span>
                                            @elseif($row->status == "canceled")
                                                <span
                                                    class="badge border border-danger text-danger  px-2 py-1 fs-13">{{$row->status}}</span>
                                            @else
                                                <span
                                                    class="badge border border-secondary text-secondary  px-2 py-1 fs-13">{{$row->status}}</span>
                                            @endif
                                        </td>


                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#!" class="btn btn-light btn-sm">
                                                    <iconify-icon icon="solar:eye-broken"
                                                                  class="align-middle fs-18"></iconify-icon>
                                                </a>
                                                <a href="#!" class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken"
                                                                  class="align-middle fs-18"></iconify-icon>
                                                </a>
                                                <a href="#!" class="btn btn-soft-danger btn-sm">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                  class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $data->links('pagination::bootstrap-4') }}
                            </div>

                        </div>
                        <!-- end table-responsive -->
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- End Container Fluid -->

@endsection

@section('js')


@endsection




