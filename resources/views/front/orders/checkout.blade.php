@extends('front.layouts.master')
@section('title')
checkout

@endsection
@section('css')

@endsection
@section('content')

<!-- Main Container  -->
<div class="main-container container">
	<ul class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i></a></li>
		<li><a href="#">Checkout</a></li>

	</ul>

	<div class="row">
		<!--Middle Part Start-->
		<div id="content" class="col-sm-12">
			<h2 class="title">Checkout</h2>
			<div class="so-onepagecheckout row">
				<div class="col-left col-sm-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-sign-in"></i> Create an Account or Login</h4>
						</div>
						<div class="panel-body">
							<div class="radio">
								<label>
									<input type="radio" value="register" name="account">
									Register Account</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" checked="checked" value="guest" name="account">
									Guest Checkout</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" value="returning" name="account">
									Returning Customer</label>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
						</div>
						<div class="panel-body">
							<fieldset id="account">
								<div class="form-group required">
									<label for="input-payment-firstname" class="control-label">First Name</label>
									<input type="text" class="form-control" id="input-payment-firstname"
										placeholder="First Name" value="" name="firstname">
								</div>
								<div class="form-group required">
									<label for="input-payment-lastname" class="control-label">Last Name</label>
									<input type="text" class="form-control" id="input-payment-lastname"
										placeholder="Last Name" value="" name="lastname">
								</div>
								<div class="form-group required">
									<label for="input-payment-email" class="control-label">E-Mail</label>
									<input type="text" class="form-control" id="input-payment-email"
										placeholder="E-Mail" value="" name="email">
								</div>
								<div class="form-group required">
									<label for="input-payment-telephone" class="control-label">Telephone</label>
									<input type="text" class="form-control" id="input-payment-telephone"
										placeholder="Telephone" value="" name="telephone">
								</div>
								<div class="form-group">
									<label for="input-payment-fax" class="control-label">Fax</label>
									<input type="text" class="form-control" id="input-payment-fax" placeholder="Fax"
										value="" name="fax">
								</div>
							</fieldset>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
						</div>
						<div class="panel-body">
							<fieldset id="address" class="required">
								<div class="form-group">
									<label for="input-payment-company" class="control-label">Company</label>
									<input type="text" class="form-control" id="input-payment-company"
										placeholder="Company" value="" name="company">
								</div>
								<div class="form-group required">
									<label for="input-payment-address-1" class="control-label">Address 1</label>
									<input type="text" class="form-control" id="input-payment-address-1"
										placeholder="Address 1" value="" name="address_1">
								</div>
								<div class="form-group">
									<label for="input-payment-address-2" class="control-label">Address 2</label>
									<input type="text" class="form-control" id="input-payment-address-2"
										placeholder="Address 2" value="" name="address_2">
								</div>
								<div class="form-group required">
									<label for="input-payment-city" class="control-label">City</label>
									<input type="text" class="form-control" id="input-payment-city" placeholder="City"
										value="" name="city">
								</div>
								<div class="form-group required">
									<label for="input-payment-postcode" class="control-label">Post Code</label>
									<input type="text" class="form-control" id="input-payment-postcode"
										placeholder="Post Code" value="" name="postcode">
								</div>
								<div class="form-group required">
									<label for="input-payment-country" class="control-label">Country</label>
									<select class="form-control" id="input-payment-country" name="country_id">
										<option value=""> --- Please Select --- </option>
										<option value="244">Aaland Islands</option>
										<option value="1">Afghanistan</option>
										<option value="2">Albania</option>
										<option value="3">Algeria</option>
										<option value="4">American Samoa</option>
										<option value="5">Andorra</option>
										<option value="6">Angola</option>
										<option value="7">Anguilla</option>
										<option value="8">Antarctica</option>
										<option value="9">Antigua and Barbuda</option>
										<option value="10">Argentina</option>
										<option value="11">Armenia</option>
										<option value="12">Aruba</option>
										<option value="252">Ascension Island (British)</option>
										<option value="13">Australia</option>
										<option value="14">Austria</option>
										<option value="15">Azerbaijan</option>
										<option value="16">Bahamas</option>
										<option value="17">Bahrain</option>

									</select>
								</div>
								<div class="form-group required">
									<label for="input-payment-zone" class="control-label">Region / State</label>
									<select class="form-control" id="input-payment-zone" name="zone_id">
										<option value=""> --- Please Select --- </option>
										<option value="3513">Aberdeen</option>
										<option value="3514">Aberdeenshire</option>
										<option value="3515">Anglesey</option>
										<option value="3516">Angus</option>
										<option value="3517">Argyll and Bute</option>
										<option value="3518">Bedfordshire</option>
										<option value="3519">Berkshire</option>
										<option value="3520">Blaenau Gwent</option>
										<option value="3521">Bridgend</option>
										<option value="3522">Bristol</option>

									</select>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" checked="checked" value="1" name="shipping_address">
										My delivery and billing addresses are the same.</label>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="col-right col-sm-9">
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default no-padding">
								<div class="col-sm-6 checkout-shipping-methods">
									<div class="panel-heading">
										<h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
									</div>
									<div class="panel-body ">
										<p>Please select the preferred shipping method to use on this order.</p>
										<div class="radio">
											<label>
												<input type="radio" checked="checked" name="Free Shipping">
												Free Shipping - $0.00</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="Flat Shipping Rate">
												Flat Shipping Rate - $7.50</label>
										</div>

									</div>
								</div>
								<div class="col-sm-6  checkout-payment-methods">
									<div class="panel-heading">
										<h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
									</div>
									<div class="panel-body">
										<p>Please select the preferred payment method to use on this order.</p>
										<div class="radio">
											<label>
												<input type="radio" checked="checked" name="Cash On Delivery">Cash On
												Delivery</label>
										</div>

										<div class="radio">
											<label>
												<input type="radio" name="Paypal">Paypal</label>
										</div>
									</div>
								</div>
							</div>



						</div>



						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><i class="fa fa-ticket"></i> Do you Have a Coupon or
										Voucher?</h4>
								</div>
								<div class="panel-body row">
									<div class="col-sm-6 ">
										<div class="input-group">
											<input type="text" class="form-control" id="input-coupon"
												placeholder="Enter your coupon here" value="" name="coupon">
											<span class="input-group-btn">
												<input type="button" class="btn btn-primary"
													data-loading-text="Loading..." id="button-coupon"
													value="Apply Coupon">
											</span>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="input-group">
											<input type="text" class="form-control" id="input-voucher"
												placeholder="Enter your gift voucher code here" value="" name="voucher">
											<span class="input-group-btn">
												<input type="submit" class="btn btn-primary"
													data-loading-text="Loading..." id="button-voucher"
													value="Apply Voucher">
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
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
												@foreach (get_card() as $row)
													<tr>
														<td class="text-center"><a
																href="{{ route('shop_details', app()->getlocale() === 'ar' ? $row->model->slug_ar : $row->model->slug_en) }}"><img
																	width="70px"
																	src="{{ asset('storage/' . $row->model?->photo?->filename) }}"
																	alt="Aspire Ultrabook Laptop"
																	title="Aspire Ultrabook Laptop"
																	class="img-thumbnail" /></a></td>
														<td class="text-left"><a
																href="{{ route('shop_details', app()->getlocale() === 'ar' ? $row->model->slug_ar : $row->model->slug_en) }}">{{ app()->getLocale() === 'ar' ? $row->model->name_ar : $row->model->name_en }}</a><br />
														</td>
														<td class="text-left">{{$row->model->SKU}}</td>


														<td class="text-left" width="200px"
															data-price="{{ $row->model->price }}">
															<div class="input-group btn-block quantity">
																<input type="number" name="quantity" min="1" max="50"
																	value="{{$row->qty}}" size="1" class="form-control"
																	onChange="updateQuantity(this, '{{$row->rowId}}')" />


																<span class="input-group-btn">
																	<a href="{{ route('delete_addTocart', $row->rowId) }}"
																		data-toggle="tooltip" title="Remove"
																		class="btn btn-danger">
																		<i class="fa fa-times-circle"></i>
																	</a>
																</span>
															</div>
														</td>



														<td class="text-right price" data-price="{{ $row->model->price }}">
															${{ $row->model->discount_price }}
														</td>
														<td id="total-price-{{$row->rowId}}">
															{{ $row->price * $row->qty }}
														</td>


													</tr>
												@endforeach

											</tbody>
											<tfoot>
												<tr>
													<td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
													<td class="text-right">${{Cart::subtotal()}}</td>
												</tr>
												
												<tr>
													<td class="text-right" colspan="4"><strong>Eco Tax:</strong>
													</td>
													<td class="text-right">${{Cart::tax()}}</td>
												</tr>
											
												<tr>
													<td class="text-right" colspan="4"><strong>Total:</strong></td>
													<td class="text-right">${{Cart::total()}}</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order
									</h4>
								</div>
								<div class="panel-body">
									<textarea rows="4" class="form-control" id="confirm_comment"
										name="comments"></textarea>
									<br>
									<label class="control-label" for="confirm_agree">
										<input type="checkbox" checked="checked" value="1" required=""
											class="validate required" id="confirm_agree" name="confirm agree">
										<span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp;
													Conditions</b></a></span> </label>
									<div class="buttons">
										<div class="pull-right">
											<input type="button" class="btn btn-primary" id="button-confirm"
												value="Confirm Order">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Middle Part End -->

	</div>
</div>
<!-- //Main Container -->
@endsection

@section('js')
<script>
function updateQuantity(input, rowId) {
    var quantity = input.value;  
    var url = "{{ route('updateCartQuantity', ':id') }}".replace(':id', rowId);  

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            quantity: quantity,
            _token: "{{ csrf_token() }}"  
        },
        success: function(response) {
            $('#total-price-' + rowId).text(response.totalPrice);
        },
        error: function(xhr, status, error) {
            alert('حدث خطأ أثناء تحديث الكمية');
        }
    });
}



</script>


@endsection