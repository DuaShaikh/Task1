@extends('layout.mail')
<style>
    table, th, td {
  border: 1px solid black;
  width: 60%;
  text-align: center;
  border-collapse: collapse;
}
</style>
<div class="container">
    <div class="row">
        <h3>Hi {{$user}}</h3>
        <p>Your order has been successfully placed.</p><br>
         
        <table class="table table-striped" style="border:1px solid gray">
            <thead>
                <tr style="border:1px solid gray;">
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
                    <tr style="border:1px solid gray;">
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
                <tr></tr>
                <tr>
                    <td>Total Price: <strong>{{$totalPrice}}</strong></td>
                </tr>
            </tfoot>
        </table>
        

    </div>
</div>