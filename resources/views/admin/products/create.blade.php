@extends('admin.layouts.master')
@section('css')

@endsection

@section('title')
   اضافه منتج جديد
@endsection

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <p>اضافه منتج جديد</p>
                </div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label class="mb-1">اسم المنتج بالعربي</label>
                                <input type="text" name="name_ar" required class="form-control">
                            </div>

                            <div class="col">
                                <label class="mb-1">اسم المنتج بالانجليزي</label>
                                <input type="text" name="name_en" required class="form-control">
                            </div>

                        </div>


                        <br>

                        <div class="row">
                            <div class="col">
                                <label class="mb-1">الرقم التسلسلي</label>
                                <input type="text" name="SKU" class="form-control" required>
                            </div>


                            <div class="col">
                                <label class="mb-1">كميه المنتج</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label class="mb-1">السعر قبل الخصم</label>
                                <input type="number" name="discount_price" class="form-control" required>
                            </div>

                            <div class="col">
                                <label class="mb-1">السعر بعد الخصم</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                        </div>

                        <br>



                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection




