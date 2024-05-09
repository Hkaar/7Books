@extends('layouts.app')

@section('title', "Seven Books")

@section('main')
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <article class="brand">
      <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="">
      <h5>Seven Books</h5>
    </article>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active cursor-pointer" aria-current="page" href="#browse">Browse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About us</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link cursor-pointer" href="#">Contact us</a>
        </li>
        <div class="d-flex align-items-center justify-content-start">
          <button class="btn btn-secondary me-1 fw-medium">Login</button>
          <button class="btn btn-primary fw-medium">Register</button>
        </div>
      </ul>
    </div>
  </div>
</nav>
<section id="browse">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 d-block d-md-none">
        <img src="{{ URL::asset('assets/imgs/7books.png') }}" class="img-fluid">
      </div>
      <div class="col-md-7 mt-5">
        <h1 class="mb-3 fw-bold">Sail the Knowledge Seas</h1>
        <h6 class="lh-lg text-secondary">Looking for a way to read a book from a library? Use our <br> service to read books from your local library</h6>
        <div class="d-flex mt-4">
          <button class="btn btn-secondary me-3 fw-semibold">What is this?</button>
          <button class="btn btn-primary fw-semibold">Get Started </button>
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
    <div class="row justify-content-around align-items-center mt-5 mb-5">
      <div class="col-md-5">
        <h3>Who We Are</h3>
        <p class="mb-1 text-start">
          We are a bunch of nerdy bookworm students that
          provide a easy way to borrow books from a library
          through an online platform
        </p>
      </div>
      <div class="col-md-5">
        <h3 class="pt-3">Our Mission</h3>
        <p class="mb-1">
          Our mission is to provide an easy way for anyone to
          borrow books from their local library, and provide away to read books
          from places that people forget nowadays
        </p>
      </div>
    </div>
  </div>
</section>
<section id="books">
  <div class="container">
    <div class="row justify-content-evenly text-center mt-5 mb-5">
      <h4 class="fw-normal text-start mb-3">Curently Trending</h4>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
          <div class="card-body">
            <p class="card-text">Harry Potter</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
          <div class="card-body">
            <p class="card-text">Lord Of The Rings</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
          <div class="card-body">
            <p class="card-text">Dungeons & Dragons</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
          <div class="card-body">
            <p class="card-text">Florida Man</p>
          </div>
        </div>
      </div>
      <h4 class="fw-normal text-start mb-3 mt-5">Newly Released</h4>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
          <div class="card-body">
            <p class="card-text">Harry Potter</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
          <div class="card-body">
            <p class="card-text">Lord Of The Rings</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
          <div class="card-body">
            <p class="card-text">Dungeons & Dragons</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="border-0">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
          <div class="card-body">
            <p class="card-text">Florida Man</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="faq">
  <div class="container">
    <div class="row justify-content-center align-items-center mt-5">
      <div class="col-md-6">
        <h4>FAQ</h4>
        <p>
          Want to know more? See the answers to our <br>
          commonly asked questions
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
<footer>
  <div class="container">
    <div class="row">
      <div class="col"></div>
    </div>
  </div>
</footer>

<!-- <footer class="d-flex justify-content-start align-items-center bg-secondary pb-5">
  <div class="left-frame">
    <div class="brand justify-content-start">
      <img src="{{ URL::asset('assets/imgs/logo.png') }}">
      <h5>Seven Books</h5>
    </div>
    <div class="text d-block justify-content-start align-items-center">
      <p class="mt-3">Sail through the sea of knowledge</p>
      <p>Copyright © SevenBooks Team. All rights reserved.</p>
    </div>
  </div>
  <div class="right-frame ml-5 mt-4">
    <h5>Explore</h5>
      <ul class="list-unstyled">
        <li class="list-group"><a href="#" class="text-decoration-none text-light lh-lg">Terms of service</a></li>
        <li class="list-group"><a href="#" class="text-decoration-none text-light lh-lg">Privacy of policy</a></li>
        <li class="list-group"><a href="#" class="text-decoration-none text-light lh-lg">Contact us</a></li>
        <li class="list-group"><a href="#" class="text-decoration-none text-light lh-lg">Supported regions</a></li>
      </ul>
  </div>
  <div class="brand-icon d-block ml-5 pb-1 mb-3 mt-3">
    <h5 class="ms-2">Social Media</h5>
    <ul class="d-flex justify-content-around list-unstyled gap-3">
      <li><a href="#"><i class="fa-brands fa-facebook fs-3 text-light"></i></a></li>
      <li><a href="#"><i class="fa-brands fa-instagram fs-3 text-light"></i></a></li>
      <li><a href="#"><i class="fa-brands fa-whatsapp fs-3 text-light"></i></a></li>
      <li><a href="#"><i class="fa-brands fa-youtube fs-3 text-light"></i></a></li>
    </ul>
    <p class="ms-2">Contact : +62 812-3710-2017 <br>
    sevenbooks.com    
    </p>

  </div>
</footer>  -->
@endsection