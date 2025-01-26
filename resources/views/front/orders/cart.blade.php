@extends('front.layouts.master')
@section('title')
cart

@endsection
@section('css')

@endsection
@section('content')
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Shopping Cart</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h2 class="title">Shopping Cart</h2>
            <div class="table-responsive form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Model</td>
                    <td class="text-left">Quantity</td>
                    <td class="text-right">discount Price</td>
                    <td class="text-right">Total</td>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td class="text-center"><a href="{{ route('shop_details', app()->getlocale() === 'ar' ? $row->product->slug_ar : $row->product->slug_en) }}"><img width="70px" src="{{ asset('storage/' . $row->product?->photo?->filename) }}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
                        <td class="text-left"><a href="{{ route('shop_details', app()->getlocale() === 'ar' ? $row->product->slug_ar : $row->product->slug_en) }}">{{$row->product->name()}}</a><br />
                         </td>
                        <td class="text-left">{{$row->product->SKU}}</td>
                        <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                            <input type="number" name="quantity" min="1" max="50" value="1" size="1" class="form-control" />
                            <span class="input-group-btn">

                            <a href="{{route('delete_addTocart',$row->product->id)}}" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                            </span></div></td>
                        <td class="text-right">${{$row->product->discount_price}}</td>
                        <td class="text-right">${{$row->product->price}}</td>
                      </tr>
                    @endforeach
           
                </tbody>
              </table>
            </div>
         
		 <div class="buttons">
            <div class="pull-left"><a href="{{route('shop')}}" class="btn btn-primary">Continue Shopping</a></div>
            <div class="pull-right"><a href="{{route('checkout')}}" class="btn btn-primary">Checkout</a></div>
          </div>
        </div>
        <!--Middle Part End --> 
			
		</div>
	</div>
	<!-- //Main Container -->
@endsection
