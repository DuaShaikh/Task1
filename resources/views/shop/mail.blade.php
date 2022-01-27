@extends('layout.mail')
<div class="container">
    <div class="row">
        <h6>Hi {{$user}}</h6>
        <p>Your order has been successfully placed.</p><br>
         
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPrice = 0;
                @endphp
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->OrderProduct->ProductMedia->url}}</td>
                        <td>{{$order->OrderProduct->pName}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->ProductPrice}}</td>
                    </tr>
                    @php
                        $totalPrice += $order->quantity*$order->ProductPrice;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Price: <strong>{{$totalPrice}}</strong></td>
                </tr>
            </tfoot>
        </table>
        

    </div>
</div>