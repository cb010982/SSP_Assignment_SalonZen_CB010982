@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Our Services</h2>
                <p>Experience the Artistry of Beauty – Your Dream Look, Our Expertise.</p>
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex mb-3">
                        @if($service->icon === 'flaticon-facial-treatment')
                            <span class="flaticon-facial-treatment"></span>
                        @elseif($service->icon === 'flaticon-cosmetics')
                            <span class="flaticon-cosmetics"></span>
                        @elseif($service->icon === 'flaticon-curl')
                            <span class="flaticon-curl"></span>
                        @else
                            <img class="flaticonimage" src="{{ $service->icon }}" alt="Service Icon">
                        @endif
                    </div>
                    <div class="media-body">
                        <h3 class="heading">{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
