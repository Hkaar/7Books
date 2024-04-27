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
          <a class="nav-link active cursor-pointer" aria-current="page" href="#">Browse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link cursor-pointer">Contact us</a>
        </li>
        <div class="d-flex align-items-center justify-content-center text-decoration-none color-white fs-5">
          <button class="btn btn-secondary me-1">Login</button>
          <button class="btn btn-primary">Register</button>
        </div>
      </ul>
    </div>
  </div>
</nav>
<section class="hero d-flex justify-content-space-beetween align-items-center mb-5">
  <div class="left-frame">
      <div class="hero-message">
          <h1 class="mb-3">Sail the Knowledge Seas</h1>
          <h5 class="lh-lg">Looking for a way to read a book from a library? Use our <br> service to read books from your local library</h5>   
      </div>
      <div class="d-flex">
          <button class="btn btn-secondary me-3 pt-2 pb-2">What is this?</button>
          <button class="btn btn-primary pt-2 pb-2">Get Started </button>
      </div>
  </div>
  <div class="hero-brand">
      <img src="{{ URL::asset('assets/imgs/7books.png') }}" alt="">
  </div>
</section>
<section class="about pt-5">
  <div class="message">
      <h3>Who we are</h3>
      <p class="mb-1">We are a bunch of nerdy bookworm students that <br>
      provide a easy way to borrow books from a library <br>
      through an online platform
      </p>
  </div>
  <div class="message">
      <h3 class="pt-3">Our Mission</h3>
      <p class="mb-1">Our mission is to provide an easy way for anyone to <br>
      borrow books from their local library, and provide a <br> way to read books
      from places that people forget <br> nowadays
      </p>
  </div>
</section>
<section class="books-showcase d-block justify-content-center align-items-center mb-5">
  <h4 class="text-left mt-5">Curently Trending</h4>
      <div class="books-slide">
          <div class="book">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
              <h5 class="text-center mt-2">Harry Potter</h5>
          </div>
              <div class="book">
                  <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                  <h5 class="text-center mt-2">Lord of the Rings</h5>
              </div>
              <div class="book">
                  <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                  <h5 class="text-center mt-2">Dungeons & Dragons</h5>
              </div>
          <div class="book">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
              <h5 class="text-center mt-2">Florida Man</h5>
          </div>
      </div>
      <h4 class="text-left mt-5">Newly Released</h4>
      <div class="books-slide">
          <div class="book">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
              <h5 class="text-center mt-2">Harry Potter</h5>
          </div>
              <div class="book">
                  <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                  <h5 class="text-center mt-2">Lord of the Rings</h5>
              </div>
              <div class="book">
                  <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                  <h5 class="text-center mt-2">Dungeons & Dragons</h5>
              </div>
          <div class="book">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
              <h5 class="text-center mt-2">Florida Man</h5>
          </div>
      </div>
</section>
<section class="faq container">
  <div class="row">
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="message">
        <h4>FAQ</h4>
          <p>
            Want to know more? See the answers to our <br>
            commonly asked questions
          </p>
      </div>
    </div> 
    <div class="col-12 col-md-6">
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
</section>
<footer class="d-inline-flex justify-content-start align-items-center bg-secondary pb-4">
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
  <div class="right-frame pt-3">
    <h5 class="ml-5">Explore</h5>
      <div>
        <li class="list-group"><a href="#" class="text-decoration-none text-light lh-lg">Terms of service</a></li>
        <li class="list-group"><a href="#" class="text-decoration-none text-light lh-lg">Privacy of policy</a></li>
        <li class="list-group"><a href="#" class="text-decoration-none text-light lh-lg">Contact us</a></li>
        <li class="list-group"><a href="#" class="text-decoration-none text-light lh-lg">Supported regions</a></li>
      </div>
  </div>
</footer>
@endsection