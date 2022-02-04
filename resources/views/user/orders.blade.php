<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>
    @foreach ($users as $order)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container orderCard" >
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <table>
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
                                                    
                                            @foreach ($order->items as $user)
                                        
                                            <tr>
                                                <td> <img src="{{url($user->orderProduct?->productMedia->url)}}" alt="" style="width: 100px;height:100px; "></td>
                                                <td>{{$user->orderProduct->pName}}</td>
                                                <td>{{$user->quantity}}</td>
                                                <td>{{$user->productPrice}}</td>
                                            </tr>
                                            @php
                                                $totalPrice += ($user->quantity * $user->productPrice);
                                            @endphp
                                            @endforeach
                                            </tbody>
                                            
                                            <tfoot>
                                                <td>Total Price: <strong>{{$totalPrice}}</strong></td>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
