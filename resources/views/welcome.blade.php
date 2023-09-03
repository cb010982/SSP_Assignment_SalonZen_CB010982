<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Salon Zen</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">
    
        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
    
        <link rel="stylesheet" href="css/aos.css">
    
        <link rel="stylesheet" href="css/ionicons.min.css">
    
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">
    
        
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
      </head>
      <body id="home">
        
        <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
                <div class="container">
                  <a class="navbar-brand" href="#home">SALON ZEN</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                  </button>
                  <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item active"><a href="#home" class="nav-link">Home</a></li>
                   <!--<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>-->
                      <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Products</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Team</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Appointments</a></li>
                        @if (Route::has('login'))
                           
                                @auth
                               <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">
                                        Home
                                    </a></li>
                                @else
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">
                                        Log in
                                    </a></li>
                
                                    @if (Route::has('register'))
                                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">
                                            Register
                                        </a></li>
                                    @endif
                                @endauth
                         
                        @endif
                 <!--     <li class="nav-item"><a href="/registration" class="nav-link">Sign Up</a></li>
                      <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>-->
                    </ul>
                  </div>
                </div>
              </nav>
            <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                  <div class="icon">
                      <a href="#home" class="logo">
                          <span class="flaticon-flower"></span>
                          <h1>Salon Zen</h1>
                      </a>
                  </div>
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Beauty Salon</h1>
                <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Where Beauty and Elegance Unite</p>
    
                <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#services" class="btn btn-white btn-outline-white px-4 py-3">View Our Services</a></p>
              </div>
            </div>
          </div>
        </div>
    
        <section class="ftco-section">
            <div class="container">
                <div class="row">
              <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                  <div class="icon d-flex mb-3"><span class="flaticon-facial-treatment"></span></div>
                  <div class="media-body">
                    <h3 class="heading">Skin &amp; Beauty Care</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                  </div>
                </div>      
              </div>
              <div class="col-md-4 ftco-animate" id="services">
                <div class="media d-block text-center block-6 services">
                  <div class="icon d-flex mb-3"><span class="flaticon-cosmetics"></span></div>
                  <div class="media-body">
                    <h3 class="heading">Makeup Pro</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                  </div>
                </div>      
              </div>
              <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                  <div class="icon d-flex mb-3"><span class="flaticon-curl"></span></div>
                  <div class="media-body">
                    <h3 class="heading">Hair Style</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                  </div>
                </div>    
              </div>
            </div>
            </div>
        </section>
    
        <section class="ftco-section bg-light">
          <div class="container">
              <div class="row justify-content-center mb-5 pb-3">
              <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Our Beauty Experts</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                          <div class="img mb-4" style="background-image: url(images/person_1.jpg);"></div>
                          <div class="info text-center">
                              <h3><a href="teacher-single.html">Mellisa Smith</a></h3>
                              <span class="position">Massage Therapist</span>
                              <div class="text">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                          <div class="img mb-4" style="background-image: url(images/person_2.jpg);"></div>
                          <div class="info text-center">
                              <h3><a href="teacher-single.html">Marie Mush</a></h3>
                              <span class="position">Hairdresser</span>
                              <div class="text">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                          <div class="img mb-4" style="background-image: url(images/person_3.jpg);"></div>
                          <div class="info text-center">
                              <h3><a href="teacher-single.html">Ana Jacobson</a></h3>
                              <span class="position">Makeup Stylist</span>
                              <div class="text">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                          <div class="img mb-4" style="background-image: url(images/person_4.jpg);"></div>
                          <div class="info text-center">
                              <h3><a href="teacher-single.html">Ivan Dorchsner</a></h3>
                              <span class="position">Nail Specialist</span>
                              <div class="text">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
    
            <section class="ftco-section ftco-discount img" style="background-image: url(images/bg_2.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-md-5 discount ftco-animate">
                            <h3>Save up to 25% Off</h3>
                            <h2 class="mb-4">Student Discount</h2>
                            <p class="mb-4">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                            <p><a href="#" class="btn btn-white btn-outline-white px-4 py-3">Book Now</a></p>
                        </div>
                    </div>
                </div>
            </section>
    
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
              <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Our Work</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <a href="#" class="work-entry">
                        <img src="images/work-9.jpg" class="img-fluid" alt="Colorlib Template">
                        <div class="info d-flex align-items-center">
                            <div>
                                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                    <span class="icon-search"></span>
                                </div>
                                <h3>Make-up</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate">
                    <a href="#" class="work-entry">
                        <img src="images/work-2.jpg" class="img-fluid" alt="Colorlib Template">
                        <div class="info d-flex align-items-center">
                            <div>
                                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                    <span class="icon-search"></span>
                                </div>
                                <h3>Hair Coloring</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate">
                    <a href="#" class="work-entry">
                        <img src="images/work-10.jpg" class="img-fluid" alt="Colorlib Template">
                        <div class="info d-flex align-items-center">
                            <div>
                                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                    <span class="icon-search"></span>
                                </div>
                                <h3>Manicure</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            </div>
        </section>
    
        <section class="ftco-partner bg-light">
            <div class="container">
                <div class="row partner justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                        <div class="col-md-3 ftco-animate">
                            <a href="#" class="partner-entry">
                                <img src="images/partner-1.jpg" class="img-fluid" alt="Colorlib template">
                            </a>
                        </div>
                        <div class="col-md-3 ftco-animate">
                            <a href="#" class="partner-entry">
                                <img src="images/partner-2.jpg" class="img-fluid" alt="Colorlib template">
                            </a>
                        </div>
                        <div class="col-md-3 ftco-animate">
                            <a href="#" class="partner-entry">
                                <img src="images/partner-3.jpg" class="img-fluid" alt="Colorlib template">
                            </a>
                        </div>
                        <div class="col-md-3 ftco-animate">
                            <a href="#" class="partner-entry">
                                <img src="images/partner-4.jpg" class="img-fluid" alt="Colorlib template">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center mb-5 pb-3">
              <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Beauty Pricing</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
            <div class="row">
                <div class="col-md-3 ftco-animate">
                    <div class="pricing-entry pb-5 text-center">
                        <div>
                            <h3 class="mb-4">Basic</h3>
                            <p><span class="price">$24.50</span> <span class="per">/ one trip</span></p>
                        </div>
                        <ul>
                            <li>Nail Cutting &amp; Styling</li>
                                    <li>Hair Trimming</li>
                                    <li>Spa Therapy</li>
                                    <li>Body Massage</li>
                                    <li>Manicure</li>
                        </ul>
                        <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="pricing-entry pb-5 text-center">
                        <div>
                            <h3 class="mb-4">Standard</h3>
                            <p><span class="price">$34.50</span> <span class="per">/ one trip</span></p>
                        </div>
                        <ul>
                            <li>Nail Cutting &amp; Styling</li>
                                    <li>Hair Trimming</li>
                                    <li>Spa Therapy</li>
                                    <li>Body Massage</li>
                                    <li>Manicure</li>
                        </ul>
                        <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                <!--	<div class="pricing-entry active pb-5 text-center">-->
                    <div class="pricing-entry pb-5 text-center">
                        <!--<div class="pricing-entry active pb-5 text-center">  // to get the pink outline permanently-->
                        <div>
                            <h3 class="mb-4">Premium</h3>
                            <p><span class="price">$54.50</span> <span class="per">/ one trip</span></p>
                        </div>
                        <ul>
                            <li>Nail Cutting &amp; Styling</li>
                                    <li>Hair Trimming</li>
                                    <li>Spa Therapy</li>
                                    <li>Body Massage</li>
                                    <li>Manicure</li>
                        </ul>
                        <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="pricing-entry pb-5 text-center">
                        <div>
                            <h3 class="mb-4">Platinum</h3>
                            <p><span class="price">$89.50</span> <span class="per">/ one trip</span></p>
                        </div>
                        <ul>
                            <li>Nail Cutting &amp; Styling</li>
                                    <li>Hair Trimming</li>
                                    <li>Spa Therapy</li>
                                    <li>Body Massage</li>
                                    <li>Manicure</li>
                        </ul>
                        <p class="button text-center"><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
                    </div>
                </div>
            </div>
                </div>
            </section>
    
            <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
                <div class="overlay"></div>
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                          <div class="text">
                              <div class="icon"><span class="flaticon-flower"></span></div>
                              <span>Products sold</span>
                            <strong class="number" data-number="3500">0</strong>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                          <div class="text">
                              <div class="icon"><span class="flaticon-flower"></span></div>
                              <span>Hair treatment</span>
                            <strong class="number" data-number="1000">0</strong>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                          <div class="text">
                              <div class="icon"><span class="flaticon-flower"></span></div>
                              <span>Happy Client</span>
                            <strong class="number" data-number="5400">0</strong>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                          <div class="text">
                              <div class="icon"><span class="flaticon-flower"></span></div>
                              <span>Skin Treatment</span>
                            <strong class="number" data-number="900">0</strong>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </section>
    
        <section class="ftco-section">
          <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
              <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">New Arrivals</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
            <div class="row d-flex">
              <div class="col-md-4 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch">
                  <a href="#" class="block-20" style="background-image: url('images/work-11.jpg');">
                  </a>
                  <div class="text py-4 d-block">
                      <div class="meta">
             <!--          <div><a href="#">Sept 10, 2018</a></div>
                      <div><a href="#">Admin</a></div>
                      <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>-->
                    </div>
                    <h3 class="heading mt-2"><a href="#">DreamSkin Night Cream</a></h3>
                    <p>Our night creams provide skin repair and renewal Where your skin undergoes a natural repair and regeneration process during night time. </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch">
                  <a href="#" class="block-20" style="background-image: url('images/product3.jpg');">
                  </a>
                  <div class="text py-4 d-block">
                      <div class="meta">
            <!--          <div><a href="#">Sept 10, 2018</a></div>
                      <div><a href="#">Admin</a></div>
                      <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>-->
                    </div>
                    <h3 class="heading mt-2"><a href="#">Pure Radiance Vitamin C Boost Serum</a></h3>
                    <p>One of our best facial serums for oily and acne-prone skins.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch">
                  <a href="#" class="block-20" style="background-image: url('images/product4.jpg');">
                  </a>
                  <div class="text py-4 d-block">
                      <div class="meta">
            <!--          <div><a href="#">Sept 10, 2018</a></div>
                      <div><a href="#">Admin</a></div>
                      <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>-->
                    </div>
                    <h3 class="heading mt-2"><a href="#">Ageless Elegance Renewal Cream</a></h3>
                    <p>Our well known anti-aging cream reduces the appearance of fine lines and wrinkles on your skin.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    
            
            <section class="ftco-section ftco-appointment">
                <div class="overlay"></div>
            <div class="container">
                <div class="row d-md-flex align-items-center">
                    <div class="col-md-2"></div>
                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                        <div class="appointment-info text-center p-5">
                            <div class="mb-4">
                                <h3 class="mb-3">Address</h3>
                                <p>	No 12. High-level Road, Nugegoda, Sri Lanka </p>
                            </div>
                            <div class="mb-4">
                                <h3 class="mb-3">Phone</h3>
                                <p class="day"><strong>+94 112 807 979</strong> or <strong>+94 777 605 000</strong></p>
                            </div>
                            <div>
                                <h3 class="mb-3">Opening Hours</h3>
                                <p class="day"><strong>Monday - Friday</strong></p>
                                <span>08:00am - 09:00pm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 appointment pl-md-5 ftco-animate">
                        <h3 class="mb-3">Appointments</h3>
                        <form action="#" class="appointment-form">
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" id="appointment_date" class="form-control" placeholder="Date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                      <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Order" class="btn btn-white btn-outline-white py-3 px-4">
                    </div>
                  </form>
                    </div>    			
                </div>
            </div>
        </section>
    
        <footer class="ftco-footer ftco-section img">
            <div class="overlay"></div>
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">About Us</h2>
                  <p>At Salon Zen, beauty is not just our business; it's our passion. We're more than just a salon; we're a sanctuary of style, relaxation, and self-care.</p>
                  <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">New Arrivals</h2>
                  <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/work-11.jpg);"></a>
                    <div class="text">
                      <h3 class="heading"><a href="#">DreamSkin Night Cream</a></h3>
                      <div class="meta">
                    <!--    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>-->
                      </div>
                    </div>
                  </div>
                  <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/product3.jpg);"></a>
                    <div class="text">
                      <h3 class="heading"><a href="#">Pure Radiance Vitamin C Boost Serum</a></h3>
                      <div class="meta">
                    <!--    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>-->
                      </div>
                    </div>
                  </div>
                  <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/product4.jpg);"></a>
                    <div class="text">
                      <h3 class="heading"><a href="#">Ageless Elegance Renewal Cream</a></h3>
                      <div class="meta">
                        <!--    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                 <div class="ftco-footer-widget mb-4 ml-md-4">
                  <h2 class="ftco-heading-2">Most rated</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Body Care</a></li>
                    <li><a href="#" class="py-2 d-block">Massage</a></li>
                    <li><a href="#" class="py-2 d-block">Hydrotherapy</a></li>
                    <li><a href="#" class="py-2 d-block">Spray tanning</a></li>
                    <li><a href="#" class="py-2 d-block">Microblading</a></li>
                    <li><a href="#" class="py-2 d-block">Scalp treatments</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                      <ul>
                        <li><span class="icon icon-map-marker"></span><span class="text">No 12. High-level Road, Nugegoda, Sri Lanka</span></li>
                        <li><a href="#"><span class="icon icon-phone"></span><span class="text">+94 112 807 979<br>+94 777 605 000</span></a></li>
                        <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@salonzen.com</span></a></li>
                      </ul>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
    
              <!--  <p> Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
     <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
       Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p> -->
       <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Senuji Pathirage</p>
              </div>
            </div>
          </div>
        </footer>
        
      
    
      <!-- loader -->
      <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    
    
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery-migrate-3.0.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.easing.1.3.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/jquery.animateNumber.min.js"></script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/jquery.timepicker.min.js"></script>
      <script src="js/scrollax.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
      <script src="js/google-map.js"></script>
      <script src="js/main.js"></script>
        
      </body>
    </html>
<!--
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
-->