<!doctype html>
<html lang="en">

  <head>
    <title>CarRental &mdash; Free Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  
      <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
  
      <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/bootstrap-datepicker.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/jquery.fancybox.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/fonts/flaticon/font/flaticon.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/aos.css')}}">
  
      <!-- MAIN CSS -->
      <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

  </head>

  <body>

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="index.html"><strong>CarRental</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="{{url('/interface')}}" class="nav-link">Home</a></li>
                  <li><a href="{{url('/listing')}}" class="nav-link">Listing</a></li>
                  <li><a href="{{url('/blog')}}" class="nav-link">Blog</a></li>
                  <li><a href="{{url('/about')}}" class="nav-link">About</a></li>
                  <li><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

      
      <div class="hero inner-page" style="background-image: url('images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Listings</strong></h1>
                <div class="custom-breadcrumbs"><a href="{{url('/interface')}}">Home</a> <span class="mx-2">/</span> <strong>Listings</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>
  



      

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Car Listings</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        

        <div class="row">

            @php $no=1 @endphp
            @foreach ($mobil as $pr)
  
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="listing d-block  align-items-stretch">
                <div class="listing-img h-100 mr-4">
  
                  {{-- <img src="admin/images/car_6.jpg" alt="Image" class="img-fluid"> --}}
                  @empty($pr->gambar)
                  <img class="img-fluid" src="{{ url('admin/img/nophoto.png') }}" alt="No Photo">
                  @else
                  <img class="img-fluid" src="{{ url('admin/img') }}/{{ $pr->gambar }}" alt="{{ $pr->nama }}">
                  @endempty
  
  
                </div>
                <div class="listing-contents h-100">
                  <h3>{{ $pr->nama }}</h3>
                  <div class="rent-price">
                    <strong>$389.00</strong><span class="mx-1">/</span>day
                  </div>
                  <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                    <div class="listing-feature pr-4">
                      <span class="caption">Warna :</span>
                      <span class="number">{{ $pr->warna }} </span>
                    </div>
                    <div class="listing-feature pr-4">
                      <span class="caption">Jumlah Kursi :</span>
                      <span class="number">{{ $pr->jumlah_kursi }} </span>
                    </div>
  
                    
                    <div class="listing-feature pr-4">
                      <span class="caption">Merk :</span>
                      <span class="number">{{ $pr->merk->merk }} </span>
                    </div>
                  </div>
                  <div>
                    <div class="card-footer">
                      <?php
                      date_default_timezone_set('Asia/Jakarta');
                      $now = new DateTime();
                      ?>
                      <small class="text-muted ">Last updated: <?php echo $now->format('l, d F Y H:i:s'); ?></small>
                    </div>
                    <p><a href="https://wa.link/vua9tq" target="_blank" class="btn btn-primary btn-sm mt-3">Rent Now</a></p>
                    
                  </div>
                </div>
              </div>
            </div>
  
            @endforeach

          
        </div>

        

        
      </div>
    </div>

    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Mike Fisher</span>
                  <span>Owner, Ford</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Jean Stanley</span>
                  <span>Traveler</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Katie Rose</span>
                  <span >Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-primary py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-4 mb-md-0">
            <h2 class="mb-0 text-white">What are you waiting for?</h2>
            <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
          </div>
          <div class="col-lg-5 text-md-right">
            <a href="#" class="btn btn-primary btn-white">Rent a car now</a>
          </div>
        </div>
      </div>
    </div>

      
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h2 class="footer-heading mb-4">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              <ul class="list-unstyled social">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
              </ul>
            </div>
            <div class="col-lg-8 ml-auto">
              <div class="row">
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Quick Links</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Resources</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Support</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Company</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="border-top pt-5">
                <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
              </div>
            </div>

          </div>
        </div>
      </footer>

    </div>

    <script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('admin/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('admin/js/aos.js')}}"></script>

    <script src="{{asset('admin/js/main.js')}}"></script>

  </body>

</html>

