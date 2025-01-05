@extends('admin.layouts.master')
@section('title')
    Edit coupons
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

            <form action="{{route('admin_coupons.update','test')}}" method="post">
                @method('PUT')
                @csrf

                <input type="hidden" value="{{$coupon->id}}" name="id">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control" required
                                   value="{{$coupon->code}}">
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>Type Code</label>
                            <select class="form-control" name="type_code" required>
                                <option value="" disabled selected>-- Choose --</option>
                                <option value="1" {{$coupon->type_code == "1" ? 'selected' :null}}>Free</option>
                                <option value="2" {{$coupon->type_code == "2" ? 'selected' :null}}>Paid In customer</option>
                            </select>
                        </div>


                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>Customers</label>
                            <select class="form-control" name="customer_id">
                                <option value="" disabled selected>-- Choose --</option>
                                @foreach(get_models('User',['type'=>'customer']) as $row)
                                    <option value="{{$row->id}}" {{$coupon->customer_id ? 'selected': null }}>{{$row->name()}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>


                </div>

                <br>

                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>discount value</label>
                            <input type="number" name="discount_value" class="form-control" required value="{{$coupon->discount_value}}">
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>discount type</label>
                            <select class="form-control" name="discount_type" required>
                                <option value="" disabled selected>-- Choose --</option>
                                <option value="cash" {{$coupon->discount_type == "cash" ? 'selected' : null}}>cash</option>
                                <option value="relative" {{$coupon->discount_type == "relative" ? 'selected' : null}}>relative</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>max used</label>
                            <input type="number" name="max_used" class="form-control" required value="{{$coupon->max_used}}">
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label>start date</label>
                            <input type="date" name="start_date" class="form-control" required value="{{$coupon->start_date}}">
                        </div>
                    </div>


                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label>end date</label>
                            <input type="date" name="end_date" class="form-control" required value="{{$coupon->end_date}}">
                        </div>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="mb-3">
                            <label>description</label>
                            <textarea class="form-control" name="description" rows="5">{{$coupon->description}}</textarea>
                        </div>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection


@section('js')

@endsection
