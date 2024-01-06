@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Your Cart</h2>
                    <!-- Other Cart Details Go Here -->
                </div>
            </div>

            @foreach($cartItems as $item)
                @if(!empty($item->cart_data))
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>Order No: {{ $item->id }}</strong><br>
                            <strong>Your order on: {{ $item->created_at }}</strong><br>
                            @if($item->status == 'PENDING')
                                <strong style="color: yellow;">Your order is {{ $item->status }}</strong>
                            @elseif($item->status == 'ACCEPTED')
                                <strong style="color: green;">Your order is {{ $item->status }}</strong>
                            @elseif($item->status == 'DECLINED')
                                <strong style="color: red;">Your order is {{ $item->status }}</strong>
                            @else
                                <strong>Your order is {{ $item->status }}</strong>
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="table mt-3">
                                <!-- Include thead only for the first iteration -->
                                @if($loop->first)
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                @endif
                                <tbody>
                                    @foreach(json_decode($item->cart_data, true) as $product)
                                        <tr>
                                            <td>{{ $product['name'] }}</td>
                                            <td>{{ $product['quantity'] }}</td>
                                            <td>{{ $product['price'] }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"><strong>Grand Total:</strong></td>
                                        <td><strong>{{ $item->price }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
