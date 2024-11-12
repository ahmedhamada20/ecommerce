@extends('admin.layouts.master')
@section('css')

@endsection

@section('title')
    الاعدادات الاساسية
@endsection

@section('content')

    <div class="row">
        <form action="{{route('admin.setting_update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id ?? null}}">

            <div class="row">
                <div class="col">
                    <label>الاسم بالعربي</label>
                    <input type="text" class="form-control" name="name_ar"
                           value="{{$data->name_ar ?? null}}" required>
                </div>

                <div class="col">
                    <label>الاسم بالانجليزي</label>
                    <input type="text" class="form-control" name="name_en"
                           value="{{$data->name_en ?? null}}" required>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col">
                    <label>رقم الهاتف</label>
                    <input type="number" class="form-control" name="phone" value="{{ $data->phone ?? '' }}" required>
                </div>

                <div class="col">
                    <label>phone_1</label>
                    <input type="number" class="form-control" name="phone_1" value="{{ $data->phone_1 ?? '' }}">
                </div>

                <div class="col">
                    <label>phone_2</label>
                    <input type="number" class="form-control" name="phone_2" value="{{ $data->phone_2 ?? '' }}">
                </div>

                <div class="col">
                    <label>phone_3</label>
                    <input type="number" class="form-control" name="phone_3" value="{{ $data->phone_3 ?? '' }}">
                </div>

                <div class="col">
                    <label>phone_4</label>
                    <input type="number" class="form-control" name="phone_4" value="{{ $data->phone_4 ?? '' }}">
                </div>


            </div>


            <br>

            <div class="row">
                <div class="col">
                    <label>facebook</label>
                    <input type="url" class="form-control" name="fb_link" value="{{ $data->fb_link ?? '' }}">
                </div>

                <div class="col">
                    <label>twitter</label>
                    <input type="url" class="form-control" name="tw_link" value="{{ $data->tw_link ?? '' }}">
                </div>
                <div class="col">
                    <label>linked</label>
                    <input type="url" class="form-control" name="in_link" value="{{ $data->in_link ?? '' }}">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label>home_tilte_logo_new_ar</label>
                    <input type="text" class="form-control" name="home_tilte_logo_new_ar"
                           value="{{$data->home_tilte_logo_new_ar ?? null}}" required>
                </div>
                <div class="col">
                    <label>home_tilte_logo_new_en</label>
                    <input type="text" class="form-control" name="home_tilte_logo_new_en"
                           value="{{$data->home_tilte_logo_new_en ?? null}}" required>
                </div>
                <div class="col">
                    <label>home_title_products_1_ar</label>
                    <input type="text" class="form-control" name="home_title_products_1_ar"
                           value="{{$data->home_title_products_1_ar ?? null}}" required>
                </div>
                <div class="col">
                    <label>home_title_products_1_en</label>
                    <input type="text" class="form-control" name="home_title_products_1_en"
                           value="{{$data->home_title_products_1_en ?? null}}" required>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col">
                    <label>notes_title_products_1_ar</label>
                    <textarea class="form-control ckeditor" name="notes_title_products_1_ar" rows="2" required>
                        {{$data->notes_title_products_1_ar ?? null}}
                    </textarea>
                </div>

                <div class="col">
                    <label>notes_title_products_1_en</label>
                    <textarea class="form-control ckeditor" name="notes_title_products_1_en" rows="2" required>
                             {{$data->notes_title_products_1_ar ?? null}}
                    </textarea>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label>home_title_products_2_ar</label>
                    <input type="text" class="form-control" name="home_title_products_2_ar"
                           value="{{$data->home_title_products_2_ar ?? null}}" required>

                </div>

                <div class="col">
                    <label>home_title_products_2_en</label>
                    <input type="text" class="form-control" name="home_title_products_2_en"
                           value="{{$data->home_title_products_2_en ?? null}}" required>

                </div>
            </div>

            <br>
            <div class="row">
                <div class="col">
                    <label>notes_title_products_2_ar</label>
                    <textarea class="form-control ckeditor" name="notes_title_products_2_ar" rows="2"
                              required>     {{$data->notes_title_products_2_ar ?? null}}</textarea>
                </div>

                <div class="col">
                    <label>notes_title_products_2_en</label>
                    <textarea class="form-control ckeditor" name="notes_title_products_2_en" rows="2"
                              required> {{$data->notes_title_products_2_en ?? null}}</textarea>
                </div>
            </div>
            <br>


            <div class="row">
                <div class="col">
                    <label>category_logo_title_ar</label>
                    <input type="text" class="form-control" name="category_logo_title_ar"
                           value="{{$data->category_logo_title_ar ?? null}}" required>
                </div>

                <div class="col">
                    <label>category_logo_title_en</label>
                    <input type="text" class="form-control" name="category_logo_title_en"
                           value="{{$data->category_logo_title_en ?? null}}" required>
                </div>
            </div>


            <br>

            <div class="row">
                <div class="col">
                    <label>logo</label>
                    <input type="file" name="logo" required class="form-control" accept="image/*">
                    @if($data->logo)
                        <img src="{{asset('storage/info/'.$data->logo)}}" width="100px"
                             height="100px" alt="">
                    @endif
                </div>


                <div class="col">
                    <label>payment_logo</label>
                    <input type="file" name="payment_logo" required class="form-control" accept="image/*">
                    @if($data->payment_logo)
                        <img src="{{asset('storage/info/'.$data->payment_logo)}}" width="100px"
                             height="100px" alt="">
                    @endif
                </div>

            </div>

            <br>

            <div class="row">
                <div class="col">
                    <label>home_open_logo_new</label>
                    <input type="file" name="home_open_logo_new" required class="form-control" accept="image/*">
                    @if($data->home_open_logo_new)
                        <img src="{{asset('storage/info/'.$data->home_open_logo_new)}}" width="100px"
                             height="100px" alt="">
                    @endif
                </div>

                <div class="col">
                    <label>partners_logo</label>
                    <input type="file" name="partners_logo" required class="form-control" accept="image/*">
                    @if($data->partners_logo)
                        <img src="{{asset('storage/info/'.$data->partners_logo)}}" width="100px"
                             height="100px" alt="">
                    @endif
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col">
                    <label>category_logo</label>
                    <input type="file" name="category_logo" required class="form-control" accept="image/*">
                    @if($data->category_logo)
                        <img src="{{asset('storage/info/'.$data->category_logo)}}" width="100px"
                             height="100px" alt="">
                    @endif
                </div>

                <div class="col">
                    <label>shop_logo</label>
                    <input type="file" name="banar_logo" required class="form-control" accept="image/*">
                    @if($data->banar_logo)
                        <img src="{{asset('storage/info/'.$data->banar_logo)}}" width="100px"
                             height="100px" alt="">
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>blog_logo</label>
                    <input type="file" name="blog_logo" required class="form-control" accept="image/*">
                    @if($data->blog_logo)
                        <img src="{{asset('storage/info/'.$data->blog_logo)}}" width="100px"
                             height="100px" alt="">
                    @endif
                </div>
            </div>
            <br>


            <div class="row">
                <div class="col">
                    <button class="btn btn-success">تعديل</button>
                </div>
            </div>


        </form>
    </div>

@endsection

@section('js')

@endsection




