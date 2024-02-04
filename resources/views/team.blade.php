@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
    <div class="row">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Beauty Experts</h2>
                    <p>Passionately Crafting Your Perfect Look – Our Stylists, Your Beauty Architects.</p>
                </div>
            </div>
            <div class="row">
                @foreach($experts as $expert)
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url({{ $expert->image }});"></div>
                        <div class="info text-center">
                            <h3><a href="#">{{ $expert->name }}</a></h3>
                            <span class="position">{{ $expert->position }}</span>
                            <div class="text">
                                <p>{{ $expert->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>

@endsection
