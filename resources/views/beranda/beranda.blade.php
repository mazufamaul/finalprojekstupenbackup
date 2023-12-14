@extends('front.app')

@section('front')
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('front/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                <p style="font-size: 18px;">Mobiluxe is your premier destination for a seamless and convenient online car rental experience.</p>

                <a href="https://youtu.be/-EKQyR3Ovdg?si=wnS6TtU5OSa8vX7o" target="_blank" class="icon-wrap d-flex align-items-center mt-4 justify-content-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa-car"></span>
                    </div>
                    <div class="heading-title ml-5">
                        <span>Easy steps for renting a car</span>
                    </div>
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  						<form action="#" class="request-form ftco-animate bg-primary">
		          		<h2>Step Make your trip</h2>
                  
                  <div class="form-group">
			    					<label for="" class="label">Register</label>
			    					<input type="text" readonly class="form-control" placeholder="Register Your account">
			    				</div>
			    				<div class="form-group">
			    					<label for="" class="label">Login</label>
			    					<input type="text" readonly class="form-control" placeholder="Login this website">
			    				</div>
			    				
			    				<div class="d-flex">

			    					<div class="form-group mr-2">
			                <label for="" class="label">Booking </label>
			                <input type="text" class="form-control" id="book_pick_date" placeholder="Booked your car">
			              </div>
                    
			              <div class="form-group ml-2">
			                <label for="" class="label">Drop-off date</label>
			                <input type="text" class="form-control" id="book_off_date" placeholder="Date">
			              </div>
		              </div>
		              <div class="form-group">
		                <label for="" class="label">Pick-up time</label>
		                <input type="text" class="form-control" id="time_pick" placeholder="Time">
		              </div>
			            <div class="form-group">
			              
                    <button class="btn btn-primary py-3 px-4"><a href="{{ route('login') }}" class="btn btn-secondary py-3 px-4">Rent Car Now</a></button>

			            </div>
			    			</form>
	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Login this website</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Car Display</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">

                        <div class="item">
                          <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url(front/images/fordranger.jpg);">
                            </div>
                            <div class="text">
                              <h2 class="mb-0"><a href="#">Ford Ranger</a></h2>
                              <div class="d-flex mb-3">
                                <span class="cat">Ford</span>
                                <p class="price ml-auto">RP 400.000<span>/day</span></p>
                              </div>

                              @guest
                                  <p class="d-flex mb-0 d-block"><a href="{{ route('login') }}" class="btn btn-primary py-2 mr-1">Login For Book</a></p>
                              @else
                                  <p class="d-flex mb-0 d-block"><a href="{{ url('/car') }}" class="btn btn-primary py-2 mr-1">Booking</a></p>
                              @endguest

                            </div>
                          </div>
                        </div>     
                        
                        <div class="item">
                          <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url(front/images/bmw.jpg);">
                            </div>
                            <div class="text">
                              <h2 class="mb-0"><a href="#">BMW I8</a></h2>
                              <div class="d-flex mb-3">
                                <span class="cat">BMW</span>
                                <p class="price ml-auto">RP 700.000 <span>/day</span></p>
                              </div>

                              @guest
                                  <p class="d-flex mb-0 d-block"><a href="{{ route('login') }}" class="btn btn-primary py-2 mr-1">Login For Book</a></p>
                              @else
                                  <p class="d-flex mb-0 d-block"><a href="{{ url('/car') }}" class="btn btn-primary py-2 mr-1">Booking</a></p>
                              @endguest

                            </div>
                          </div>
                        </div>   


                        <div class="item">
                          <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url(front/images/xenia.jpg);">
                            </div>
                            <div class="text">
                              <h2 class="mb-0"><a href="#">Xenia Deluxe</a></h2>
                              <div class="d-flex mb-3">
                                <span class="cat">Daihatsu</span>
                                <p class="price ml-auto">RP 500.000<span>/day</span></p>
                              </div>

                              @guest
                                  <p class="d-flex mb-0 d-block"><a href="{{ route('login') }}" class="btn btn-primary py-2 mr-1">Login For Book</a></p>
                              @else
                                  <p class="d-flex mb-0 d-block"><a href="{{ url('/car') }}" class="btn btn-primary py-2 mr-1">Booking</a></p>
                              @endguest

                            </div>
                          </div>
                        </div>     
                        
                        <div class="item">
                          <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url(front/images/innova.jpg);">
                            </div>
                            <div class="text">
                              <h2 class="mb-0"><a href="#">Kijang Innova</a></h2>
                              <div class="d-flex mb-3">
                                <span class="cat">Toyota</span>
                                <p class="price ml-auto">RP 300.000 <span>/day</span></p>
                              </div>

                              @guest
                                  <p class="d-flex mb-0 d-block"><a href="{{ route('login') }}" class="btn btn-primary py-2 mr-1">Login For Book</a></p>
                              @else
                                  <p class="d-flex mb-0 d-block"><a href="{{ url('/car') }}" class="btn btn-primary py-2 mr-1">Booking</a></p>
                              @endguest

                            </div>
                          </div>
                        </div>
    					

    					
    					
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-about">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(front/images/about.jpg);">
                    </div>
                    <div class="col-md-6 wrap-about ftco-animate">
            <div class="heading-section heading-section-white pl-md-5">
                <span class="subheading">About us</span>
                <h2 class="mb-4">Welcome to Mobil-Uxe</h2>

                
                <p>Mobiluxe is your premier destination for a seamless and convenient online car rental experience. As a leading name in the world of online car rentals, Mobiluxe offers a fleet of top-notch vehicles to suit your travel needs, ensuring a journey that is as comfortable as it is stylish.</p>

                <p>Our user-friendly online platform allows you to browse through our diverse range of vehicles effortlessly. With just a few clicks, you can reserve the car of your choice, making the entire booking process quick and hassle-free.</p>

                <p><a href="#" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
            </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-3">Our Latest Services</h2>
        </div>
        </div>

        <div class="row">
          <div class="col-md-4">
              <div class="services services-2 w-100 text-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
                  <div class="text w-100">
                      <h3 class="heading mb-2">Car Rental</h3>
                      <p>Explore our fleet of high-quality vehicles for all your travel needs.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="services services-2 w-100 text-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                  <div class="text w-100">
                      <h3 class="heading mb-2">Airport Shuttle</h3>
                      <p>Reliable and comfortable airport transportation services for a stress-free journey.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="services services-2 w-100 text-center">
                  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
                  <div class="text w-100">
                      <h3 class="heading mb-2">Road Trips</h3>
                      <p>Plan your road adventures with our flexible and affordable road trip packages.</p>
                  </div>
              </div>
          </div>
        </div>
  




           

                
                </div>
            </div>
        </div>
</section>

    {{-- <section class="ftco-section ftco-intro" style="background-image: url(front/images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section heading-section-white ftco-animate">
        <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
        <a href="#" class="btn btn-primary btn-lg">Become A Driver</a>
        </div>
            </div>
        </div>
    </section> --}}


    {{-- <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(front/images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(front/images/person_2.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(front/images/person_3.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(front/images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(front/images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    {{-- <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('front/images/image_1.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('front/images/image_2.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('front/images/image_3.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>	 --}}

    {{-- <section class="ftco-counter ftco-section img bg-light" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="60">0</strong>
                <span>Year <br>Experienced</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1090">0</strong>
                <span>Total <br>Cars</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="2590">0</strong>
                <span>Happy <br>Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="67">0</strong>
                <span>Total <br>Branches</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>	 --}}
    

   


   
@endsection