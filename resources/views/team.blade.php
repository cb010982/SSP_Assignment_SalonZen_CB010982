@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
       <!-- <div class="row justify-content-center mb-5 pb-3">
       <div class="col-md-7 heading-section text-center ftco-animate">
       <h2 class="mb-4">Our Work</h2>
        <p class="work-category">
            <span class="px-2"><a href="#" class="active">All</a></span> 
            <span class="px-2"><a href="#">Make Up</a></span> 
            <span class="px-2"><a href="#">Massage</a></span> 
            <span class="px-2"><a href="#">Facial</a></span>
            <span class="px-2"><a href="#">Spa</a></span>
            <span class="px-2"><a href="#">Hair</a></span>
            <span class="px-2"><a href="#">Nail</a></span>
        </p>
      </div>
    </div>-->
    <div class="row">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Beauty Experts</h2>
                    <p>Passionately Crafting Your Perfect Look – Our Stylists, Your Beauty Architects.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/person_1.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="#">Mellisa Smith</a></h3>
                            <span class="position">Makeup Stylist</span>
                            <div class="text">
                                <p>I'm dedicated to elevating your natural beauty and confidence. With 12 years of
                                    experience, I specialize in bridal, special occasion, and photoshoot makeup.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/person_2.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="#">Marie Bush</a></h3>
                            <span class="position"> Massage Therapist</span>
                            <div class="text">
                                <p>Welcome to Salon Zen . Having 20 years of experience, I offer a range of therapeutic
                                    massage techniques tailored to your unique needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/person_3.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="#">Ana Holland</a></h3>
                            <span class="position">Nail Specialist </span>
                            <div class="text">
                                <p>With a keen eye for detail and a passion for nail artistry, I create stunning,
                                    long-lasting manicures and pedicures tailored to your style.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/work-5.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="#">Iris Anderson</a></h3>
                            <span class="position">Hairdresser</span>
                            <div class="text">
                                <p>Welcome to Salon Zen, where your dream hairstyle becomes a reality. I specialize in
                                    crafting personalized hair transformations to create your signature look.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/extra5.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="#">Michael Harris</a></h3>
                            <span class="position">Esthetician</span>
                            <div class="text">
                                <p>I'm passionate about skincare and believe that healthy skin is the foundation of beauty. My facials and treatments will 
                                    leave your skin glowing and refreshed.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/extra6.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="#">Liam Robinson</a></h3>
                            <span class="position">Eye-Brow Specialist</span>
                            <div class="text">
                                <p>Your eyebrows frame your face, and I'm here to make them look their best. 
                                    From shaping to tinting, I'll enhance your natural beauty.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/work-16.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="#">Ava White</a></h3>
                            <span class="position">Bridal Stylist</span>
                            <div class="text">
                                <p>Your dream wedding look begins here. 
                                    Let's create a bridal ensemble that's as special and unique as your love story.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/work-15.jpg);"></div>
                        <div class="info text-center">
                            <h3><a href="#">Olivia Davis</a></h3>
                            <span class="position">Waxing Specialist</span>
                            <div class="text">
                                <p>Say goodbye to unwanted hair! I provide professional waxing services that 
                                    leave your skin smooth and hair-free. You'll love the results.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!--   <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div>-->
    </div>
</section>

@endsection
