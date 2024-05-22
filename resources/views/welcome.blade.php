@extends('layouts.app')

@section('title', "Seven Books")

@section('main')
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a href="{{ route('/') }}" class="d-flex align-items-center justify-content-center gap-2 text-center text-inherit text-none">
      <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="Image not available" class="img-fluid ratio-box img-small-logo">
      <h6 class="fw-bold">Seven Books</h6>
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars text-inherit"></i>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active cursor-pointer" aria-current="page" href="#">Browse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>
        <div class="d-flex align-items-center justify-content-start">
          <a href="{{ route('login') }}" class="btn btn-secondary me-1">Login</a>
          <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </div>
      </ul>
    </div>
  </div>
</nav>

<section id="hero">
  <div class="container mb-5">
    <div class="row">
      <div class="col-md-5 d-block d-md-none">
        <img src="{{ URL::asset('assets/imgs/7books.png') }}" class="img-fluid">
      </div>
      <div class="col-md-7 mt-5">
        <h1>Sail The Knowledge Seas</h1>
        <h6 class="text-secondary lh-lg">Looking for a way to read a book from a library? Use our <br>
         service to read books from your local library</h6>
         <div class="flex mt-3">
          <button class="btn btn-secondary fw-medium">What is this</button>
          <button class="btn btn-primary ms-3 fw-medium">Get Started</button>
         </div>
      </div>
      <div class="col-md-5 d-none d-md-block">
        <img src="{{ URL::asset('assets/imgs/7books.png') }}" class="img-fluid">
      </div>
    </div>
  </div>
</section>
<section id="about">
  <div class="container">
    <div class="row justify-content-around">
      <div class="col-md-5">
        <h3>Who We Are</h3>
        <p>We  are a bunch of nerdy bookworm students that provide 
          a easy way to borrow books from a library through an online platform</p>
      </div>
      <div class="col-md-5">
        <h3>Our Mission</h3>
        <p>Our mission is to provide an easy way for anyone to borrow books from their local library,
           and provide a way to read books from places that people forget nowadays</p>
      </div>
    </div>
  </div>
</section>
<section id="books">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <h4 class="fw-normal mb-3">Currently Trending</h4>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid" style="width:245px; height:377px">
          <div class="card-body mt-3">
            <p class="fw-semibold">Harry Potter</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid" style="width:245px; height:377px">
          <div class="card-body mt-3">
            <p class="fw-semibold">Lord Of The Rings</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid" style="width:245px; height:377px">
          <div class="card-body mt-3">
            <p class="fw-semibold">Dungeons & Dragons</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid" style="width:245px; height:377px">
          <div class="card-body mt-3">
            <p class="fw-semibold">Florida Man</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
      <h4 class="fw-normal mb-3 mt-5">Newly Released</h4>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid" style="width:245px; height:377px">
          <div class="card-body mt-3">
            <p class="fw-semibold">Harry Potter</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid" style="width:245px; height:377px">
          <div class="card-body mt-3">
            <p class="fw-semibold">Lord Of The Rings</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid" style="width:245px; height:377px">
          <div class="card-body mt-3">
            <p class="fw-semibold">Dungeons & Dragons</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid" style="width:245px; height:377px">
          <div class="card-body mt-3">
            <p class="fw-semibold">Florida Man</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="faq">
  <div class="container mt-5">
    <div class="row justify-content-around align-items-center">
      <div class="col-md-6">
        <h4>FAQ</h4>
        <p>
        Want to know more? See the answers to our <br> commonly asked questions
        </p>
      </div>
      <div class="col-md-6">
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button bg-secondary p-4 rounded-bottom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              What is SevenBooks?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong>
              It is shown by default, until the collapse plugin adds the appropriate
               classes that we use to style each element. These classes control the overall appearance,
                as well as the showing and hiding via CSS transitions. You can modify any of this with custom
                 CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the 
                 <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button bg-secondary p-4 rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              How do i search for a book?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong>
              It is hidden by default, until the collapse plugin adds the appropriate 
              classes that we use to style each element. These classes control the overall appearance,
               as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS 
               or overriding our default variables. It's also worth noting that just about any HTML can go within the
                <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button bg-secondary p-4 rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
              How do i pick up a book
            </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> 
              It is hidden by default, until the collapse plugin adds the appropriate 
              classes that we use to style each element. These classes control the overall appearance,
               as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS 
               or overriding our default variables. It's also worth noting that just about any HTML can go within the
                <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="panelsStayOpen-headingFour">
            <button class="accordion-button bg-secondary p-4 rounded-top collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
              How do i rate a book?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong>
               It is hidden by default, until the collapse plugin adds the appropriate
                classes that we use to style each element. These classes control the overall appearance,
                 as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS
                  or overriding our default variables. It's also worth noting that just about any HTML can go within the 
                  <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
<footer class="bg-secondary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col mt-5">
        <div class="col-md-8 d-flex align-items-center">
          <img src="{{ URL::asset('assets/imgs/logo.png') }}" class="img-fluid" style="width:50px">
          <h5 class="ms-2">Seven Books</h5>
        </div>
        <p class="mt-3">Sail through the sea of knowledge</p>
      </div>
      <div class="col-md-4 mt-5">
        <h5>Exproller</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-decoration-none text-light">Terms of service</a></li>
          <li><a href="#" class="text-decoration-none text-light">Privacy Policy</a></li>
          <li><a href="#" class="text-decoration-none text-light">Contact us</a></li>
          <li><a href="#" class="text-decoration-none text-light">Supported Regions</a></li>
        </ul>
      </div>
      <div class="col-md-3 mt-5">
        <h5>Follow us</h5>
        <div class="mt-2">
          <a href=""><i class="fa-brands fa-facebook fs-3 text-light"></i></a>
          <a href=""><i class="fa-brands fa-instagram fs-3 text-light ms-2"></i></a>
          <a href=""><i class="fa-brands fa-youtube fs-3 text-light ms-2"></i></a>
          <a href=""><i class="fa-brands fa-whatsapp fs-3 text-light ms-2"></i></a>
        </div>
        <div class="mt-2">
        <i class="fa-solid fa-user"><a href="#" class="text-decoration-none text-light ms-2">+62 813-3820-2018</a></i>
        </div>
      </div>
      <a href="#" class="text-decoration-none text-light mt-4 pb-2">Copyright © SevenBooks Team. All rights reserved.</a>
    </div>
  </div>
</footer>
@endsection
