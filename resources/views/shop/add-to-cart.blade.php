@extends('layout.ecommerce')
@section('title', 'View-Cart')
@section('main')
<div class="page-container">
	<div class="conatiner-fuild">
		<form action="checkout" method="post">
			@csrf
			<div class="container" style="margin-top:50px">
				<table id="cart" class="table table-hover table-condensed">
					<thead>
						<div class="container">
							<div class="row">
								<tr>
									<th style="width:50%">Product</th>
									<th style="width:10%">Price</th>
									<th style="width:8%">Quantity</th>
									<th style="width:8%">Size</th>
									<th style="width:22%" colspan="2">Subtotal</th>
									<th style="width:10%"></th>
								</tr>
							</div>
						</div>
					</thead>
					@php
						$totalPrice = 0;
					@endphp
					@if(auth()->check())
					@foreach ($carts as $key => $cart)
					<tbody>
						<input type="hidden" value="{{$cart->user_id}}">
							<tr>
								<td data-th="Product">
									<div class="container">
									<div class="row">
										<div class="col-sm-3 hidden-xs"><img src="{{$cart->cartProduct?->productMedia->url}}" alt="..." class="img-responsive" style="width: 110px;height:110px"/></div>
										<div class="col-5 col-lg-4 col-md-12 col-sm-12">
											<h4 class="nomargin">{{$cart->cartProduct->pName}}</h4><br>
											<p>{{$cart->cartProduct->description}}</p>
										</div>
									</div>
								</div>
								</td>
								<td data-th="Price">{{$cart->cartProduct->productPrice}}</td>
								<td data-th="Quantity">
									<input type="number" class="form-control text-center" name="cart[{{$key}}][quantity]" value="{{$cart->quantity}}">
									<input type="hidden" class="form-control text-center" name="cart[{{$key}}][product_id]" value="{{$cart->product_id}}">
								</td>
								<td>
									<select class="form-select" id="floatingSelectGrid" name="cart[{{$key}}][size]" aria-label="Floating label select example">
										<option >None</option>
										<option value="S" {{$cart->size == "S" ? "selected" : ''}}>S</option>
										<option value="M" {{$cart->size == "M" ? "selected" : ''}}>M</option>
										<option value="L" {{$cart->size == "L" ? "selected" : ''}}>L</option>
									</select>
								</td>
			                      
								<td data-th="Subtotal" class="text-center">
									<div class="container">
										<div class="row">
											<div class="col-12 col-lg-4 col-md-12 col-sm-12">
												<p>{{$cart->cartProduct->productPrice * $cart->quantity}}</p>
											</div>
											<div class="col-12 col-lg-4 col-md-12 col-sm-12">
												<button class="btn btn-danger btn-sm" type="button"> <a href ='deleteCart/{{$cart->id}}'><i class="fas fa-trash"></i></a></button>								
											</div>
										</div>
									</div>
								</td>
							</tr>
					</tbody>
					
					@php
						$totalPrice += $cart->cartProduct->productPrice * $cart->quantity;
					@endphp
					@endforeach
					@else 
						<tr>
							<td colspan="6">No Items</td>
						</tr>
					@endif
						<tfoot>
							<tr>
								<td><a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
								<td colspan="2" class="hidden-xs"></td>
								<td class="hidden-xs text-center">Total Price: <strong>{{$totalPrice}}</strong></td>
								<td><a href="checkout"><input type="submit" class="btn btn-success btn-block" value="Checkout"></a></td>
							</tr>
						</tfoot>
				</table>
			</div>
		</form>
	</div>
</div>
@endsection
