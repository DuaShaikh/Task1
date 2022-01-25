@extends('layout.ecommerce')
@section('title', 'View-Cart')
@section('main')
<x-navbar />
<form action="checkout" method="post">
	@csrf
    <div class="container" style="margin-top:50px">
	    <table id="cart" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width:50%">Product</th>
					<th style="width:10%">Price</th>
					<th style="width:8%">Quantity</th>
					<th style="width:8%">Size</th>
					<th style="width:22%" class="text-center">Subtotal</th>
					<th style="width:10%"></th>
				</tr>
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
							<div class="row">
								<div class="col-sm-3 hidden-xs"><img src="{{$cart->CartProduct?->ProductMedia->url}}" alt="..." class="img-responsive" style="width: 110px;height:110px"/></div>
								<div class="col-sm-8">
									<h4 class="nomargin">{{$cart->CartProduct->pName}}</h4>
									<p>{{$cart->CartProduct->description}}</p>
								</div>
							</div>
						</td>
						<td data-th="Price">{{$cart->CartProduct->productPrice}}</td>
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

						<td data-th="Subtotal" class="text-center">{{$cart->cartProduct->productPrice * $cart->quantity}}</td>
						<td class="actions" data-th="">
							{{-- <button class="btn btn-info btn-sm"><i class="fas fa-refresh"></i></button> --}}
							<button class="btn btn-danger btn-sm"> <a href = "deleteCart/{{$cart->id}}"><i class="fas fa-trash"></i></a></button>								
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
					{{-- <a href="checkout" class="btn btn-success btn-block">Checkout </a> --}}
					<td><a href="checkout"><input type="submit" class="btn btn-success btn-block" value="Checkout"></a></td>
				</tr>
			</tfoot>
		</table>
    </div>
</form>
@endsection