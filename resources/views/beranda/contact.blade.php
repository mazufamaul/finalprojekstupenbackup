@extends('front.app')

@section('front')


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('front/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Contact Us</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section d-flex align-items-center">
   
    
    <div class="container card">
        <div class="row d-flex contact-info justify-content-center mt-5">
            <div class="col-md-4">
                <div class="row mb-5">
                    <!-- ... (bagian kontak lainnya) ... -->
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Jl. Tangerang raya no 43 ,Kota Tangerang ,Banten ,15157</p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Phone:</span> <a href="tel://1234567920">+62887664532</a></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">Mobiluxe@gmail.com</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center">
        	<div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31729.441641437086!2d106.68425926296587!3d-6.239964864251479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb5c1d156f31%3A0x5a8b06c4012531de!2sArc_rentcar!5e0!3m2!1sen!2sid!4v1702244215674!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        	</div>
        </div>

    </div>
</section>

 


@endsection