@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Your Cart History</h2>
                    <!-- Other Cart Details Go Here -->
                </div>
            </div>

            @foreach($cartItems as $item)
                @if(!empty($item->cart_data))
                    <div class="card mb-4" style="border: 0.5px solid #7D747C;">
                        <div class="card-header"  style="background-color:#959595; color: white;">
                        <p class="mb-0">
                        <strong style="display: inline-block;">Order No: {{ $item->id }} at {{ $item->created_at }}</strong>
                        </p>
                            @if($item->status == 'PENDING')
                                <strong style="color: yellow;">Your order is {{ $item->status }}</strong>
                            @elseif($item->status == 'DISPATCHED')
                                <strong style="color: green;">Your order is {{ $item->status }}</strong>
                            @else
                                <strong style="color:yellow;">Your order is {{ $item->status }}</strong>
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="table mt-3">
                                <!-- Include thead only for the first iteration -->
                                @if($loop->first)
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="name-column">Name</th>
                                        <th scope="col" class="quantity-column">Quantity</th>
                                        <th scope="col" class="price-column">Price</th>
                                    </tr>
                                    </thead>
                                @endif
                                <tbody>
                                    @foreach(json_decode($item->cart_data, true) as $product)
                                        <tr>
                                            <td class="name-column">{{ $product['name'] }}</td>
                                            <td class="quantity-column">{{ $product['quantity'] }}</td>
                                            <td class="price-column" >{{ $product['price'] }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"><strong>Grand Total:</strong></td>
                                        <td class="price-column"><strong>{{ $item->price }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <style>
        /* Custom style for price alignment */
        .name-column {
            width: 40%; /* Adjust as needed */
        }
        .quantity-column {
            width: 20%; /* Adjust as needed */
            text-align: center; /* Center-align quantity values */
        }
        .price-column {
            width: 40%; /* Adjust as needed */
            text-align: right; /* Right-align price values */
        }
    </style>
@endsection
