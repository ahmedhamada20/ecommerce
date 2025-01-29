@extends('user.layouts.master')
@section('title')
    orders details
@endsection
@section('css')
@endsection


@section('content')

    <div class="dashboard-main-body">


        <div id="main-order-content" bis_skin_checked="1">

            <div class="row row-cards" bis_skin_checked="1">
                <div class="col-md-9" bis_skin_checked="1">
                    <div class="card mb-3" bis_skin_checked="1">
                        <div class="card-body d-print-none"
                             bis_skin_checked="1">
                            <div class="datagrid"
                                 bis_skin_checked="1">
                                <div class="datagrid-item"
                                     bis_skin_checked="1">
                                    <div class="datagrid-title"
                                         style="display: flex; justify-content: space-between"
                                         bis_skin_checked="1">Order Number


                                    </div>
                                    <div class="datagrid-content"
                                         bis_skin_checked="1"><a
                                            href="#"
                                            target="_blank">
                                            <h6>{{$row->order_number}}</h6>


                                        </a>

                                    </div>
                                </div>

                                <div class="datagrid-item"
                                     bis_skin_checked="1">
                                    <div class="datagrid-title"
                                         bis_skin_checked="1">Status
                                    </div>
                                    <div class="datagrid-content"
                                         bis_skin_checked="1">

                                        {!! $row->getStatusColor() !!}

                                    </div>
                                </div>




                                <div class="datagrid-item"
                                     bis_skin_checked="1">
                                    <div class="datagrid-title"
                                         bis_skin_checked="1">Last
                                        Update
                                    </div>
                                    <div class="datagrid-content"
                                         bis_skin_checked="1">{{$row->updated_at}}</div>
                                </div>

                                <div class="datagrid-item"
                                     bis_skin_checked="1">
                                    <div class="datagrid-title"
                                         bis_skin_checked="1">Total
                                    </div>
                                    <div class="datagrid-content"
                                         bis_skin_checked="1">{{$row->total}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header justify-content-between"
                             bis_skin_checked="1">
                            <h6 class="card-title">
                                Order information :: {{$row->order_number}}
                            </h6>


                        </div>
                        <table class="table table-bordered table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Image</th>
               
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($row->order_item as $items)
                                    <tr>
                                        <td style="width: 80px;">
                                            <img src="{{ asset('storage/' . $items->product?->photo?->filename) }}"
                                                alt="EPSION Plaster Printer" class="img-fluid">
                                        </td>
                          
                                        <td>${{$items->price_per_unit}}</td>
                                        <td>{{$items->quantity}}</td>
                                        <td>${{$row->total}}</td>
                                    </tr>
    
                                @endforeach
    
                            </tbody>
                        </table>


                        <div class="card-body" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3" bis_skin_checked="1">

                    <div class="card" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                            <h4 class="card-title">
                                Customer
                            </h4>
                        </div>

                        <div class="card-body p-0" bis_skin_checked="1">
                            <div class="p-3" bis_skin_checked="1">


                                <p class="mb-1">
                                    <svg
                                        class="icon  svg-icon-ti-ti-inbox"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24"
                                        viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none"
                                              d="M0 0h24v24H0z"
                                              fill="none"></path>
                                        <path
                                            d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                        <path
                                            d="M4 13h3l3 3h4l3 -3h3"></path>
                                    </svg> {{$row->customer->orders()->count()}}
                                    order(s)
                                </p>

                                <p class="mb-1 fw-semibold">
                                    {{$row->customer->name()}}
                                </p>

                                <p class="mb-1">
                                    <a
                                        href="{{$row->customer->email}}">
                                        {{$row->customer->email}}
                                    </a>
                                </p>

                                <p class="mb-1">
                                    <a href="tel:{{$row->customer->phone}}">
                                        {{$row->customer->phone}}
                                    </a>
                                </p>

                            </div>
                            <hr>
                            <div class="hr my-1"
                                 bis_skin_checked="1"></div>

                            <div class="p-3" bis_skin_checked="1">
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                    bis_skin_checked="1">
                                    <h6>Shipping information</h6>

                                </div>

                                <dl class="shipping-address-info mb-0">
                                    <dd>{{$row->shipping_address}}</dd>
                                    <dd>{{$row->billing_address}}</dd>

                                </dl>
                            </div>

                            <div class="hr my-1"
                                 bis_skin_checked="1"></div>

                            <div class="p-3" bis_skin_checked="1">
                                <h6 class="mb-2">Store</h6>

                            </div>
                            <div class="col"
                                 bis_skin_checked="1">
                                <table
                                    class="table table-vcenter card-table table-borderless text-end">
                                    <tbody style="text-align: start;">
                                    <tr>
                                        <td style=" padding-left: 20px">
                                            Quantity
                                        </td>
                                        <td>
                                            {{$row->order_items()}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=" padding-left: 20px">
                                            Sub total
                                        </td>
                                        <td>
                                            {{$row->subtotal}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style=" padding-left: 20px">
                                            discount
                                        </td>
                                        <td>
                                            {{$row->discount}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style=" padding-left: 20px">
                                            total
                                        </td>
                                        <td>
                                            {{$row->total}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style=" padding-left: 20px">
                                            payment type
                                        </td>
                                        <td>
                                            {!! $row->getOrderTypeColor() !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=" padding-left: 20px">
                                            coupon
                                        </td>
                                        <td>
                                            {{$row?->coupon?->code}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=" padding-left: 20px">
                                            placed at
                                        </td>
                                        <td>
                                            {{$row->placed_at}}
                                        </td>
                                    </tr>


                                    <tr>
                                        <td >
                                            completed at
                                        </td>
                                        <td>
                                            {{$row->completed_at}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style=" padding-left: 10px">
                                            cancelled at
                                        </td>
                                        <td>
                                            {{$row->cancelled_at}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ref id
                                        </td>
                                        <td>
                                            {{$row->ref_id}}
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>


                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection


@section('js')

@endsection
