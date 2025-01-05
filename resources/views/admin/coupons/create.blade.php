@extends('admin.layouts.master')
@section('title')
    Add new coupons
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

            <form action="{{route('admin_coupons.store')}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control" required
                                   value="{{generateRandomString()}}">
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>Type Code</label>
                            <select class="form-control" name="type_code" required>
                                <option value="" disabled selected>-- Choose --</option>
                                <option value="1">Free</option>
                                <option value="2">Paid In customer</option>
                            </select>
                        </div>


                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>Customers</label>
                            <select class="form-control" name="customer_id">
                                <option value="" disabled selected>-- Choose --</option>
                                @foreach(get_models('User',['type'=>'customer']) as $row)
                                    <option value="{{$row->id}}">{{$row->name()}}</option>
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
                            <input type="number" name="discount_value" class="form-control" required value="">
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>discount type</label>
                            <select class="form-control" name="discount_type" required>
                                <option value="" disabled selected>-- Choose --</option>
                                <option value="cash">cash</option>
                                <option value="relative">relative</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label>max used</label>
                            <input type="number" name="max_used" class="form-control" required value="">
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label>start date</label>
                            <input type="date" name="start_date" class="form-control" required value="">
                        </div>
                    </div>


                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-3">
                            <label>end date</label>
                            <input type="date" name="end_date" class="form-control" required value="">
                        </div>
                    </div>

                </div>

                <br>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="mb-3">
                            <label>description</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
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
