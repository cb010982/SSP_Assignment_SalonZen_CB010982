@extends('layouts.app')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Our Products</h2>
                <p>Indulge in Luxury – Our Products are the Epitome of Elegance and Efficacy.</p>
            </div>
        </div>
        <div class="row d-flex">
            @foreach($products as $product)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('{{ asset($product->image) }}');"></a>
                   
                    <div class="text py-4 d-block">
                        <h3 class="heading mt-2">{{ $product->name }} <span> &nbsp; <i class="cart-icon fas fa-shopping-cart"></i></h3>
                        <h4>Rs {{ $product->price }}</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

