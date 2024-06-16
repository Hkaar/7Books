@extends('layouts.app')

@section('title', "Seven Books")

@section('main')
<x-svb-navigation-bar :search=true :menus=true active=""></x-svb-navigation-bar>

<section id="hero" style="margin:5rem 0">
  <div class="container">
    <div class="row justify-content-center align-items-center mb-5">
      <div class="col-md-5 d-block d-md-none">
        <img src="{{ URL::asset('assets/imgs/7books.png') }}" class="img-fluid">
      </div>
      <div class="col-md-6 d-block d-md-none text-center">
        <h4 class="fw-bold">Sail The Knowledge Seas</h4>
        <p class="text-secondary lh-lg ">Looking for a way to read a book from a library? Use our
         service to read books from your local library</p>
         <div class="flex">
          <button class="btn btn-secondary fw-medium">What is this</button>
          <button class="btn btn-primary ms-3 fw-medium">Get Started</button>
         </div>
      </div>
      <div class="col-md-7 d-none d-md-block">
        <h2 class="fw-bold">Sail The Knowledge Seas</h2>
        <p class="text-secondary lh-lg">Looking for a way to read a book from a library? Use our
         service to read books from your local library</p>
         <div class="flex mt-2">
          <button class="btn btn-secondary fw-medium">What is this</button>
          <button class="btn btn-primary ms-3 fw-medium">Get Started</button>
         </div>
      </div>
      <div class="col-md-4 d-none d-md-block">
        <img src="{{ URL::asset('assets/imgs/7books.png') }}" class="img-fluid">
      </div>
    </div>
  </div>
</section>

<section id="about" style="margin:7rem 0;">
  <div class="container">
    <div class="row justify-content-center align-items-center gap-5">
      <div class="col-md-6 d-block d-md-none">
        <h4 class="text-center">Who We Are</h4>
        <p style="font-size: 15px">We are a bunch of nerdy bookworm students that provide 
            a easy way to borrow books from a library through an online platform</p>
      </div>
      <div class="col-md-6 d-block d-md-none mt-4">
        <h4 class="text-center">Our Mission</h4>
        <p style="font-size: 15px">Our mission is to provide an easy way for anyone to borrow books from their local library,
            and provide a way to read books from places that people forget nowadays</p>
      </div>
      <div class="col-md-5 d-none d-md-block mt-1">
        <h3>Who We Are</h3>
        <p style="font-size: 15px">We are a bunch of nerdy bookworm students that provide 
            a easy way to borrow books from a library through an online platform</p>
      </div>
      <div class="col-md-5 d-none d-md-block">
        <h3>Our Mission</h3>
        <p style="font-size: 15px">Our mission is to provide an easy way for anyone to borrow books from their local library,
            and provide away to read books from places that people forget nowadays</p>
      </div>
    </div>
  </div>
</section>

<section id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel" style="margin:3rem 0">
  <div class="container">
    <h5 class="fw-normal mb-3 d-none d-md-block ms-4">Currently Trending</h5>
    <h5 class="fw-normal mb-3 d-block d-md-none text-center">Currently Trending</h5>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="card-wrapper container-sm d-flex  justify-content-evenly">
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Harry Potter</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Lord Of The Rings</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Dungeons & Dragons</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Florida Man</p>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card-wrapper container-sm d-flex  justify-content-around">
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Harry Potter</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Lord Of The Rings</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Dungeons & Dragons</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Florida Man</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<section id="carouselExampleControlsTwo" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="container">
    <h5 class="fw-normal mb-3 d-none d-md-block ms-4">Newly Released</h5>
    <h5 class="fw-normal mb-3 d-block d-md-none text-center">Newly Released</h5>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="card-wrapper container-sm d-flex  justify-content-evenly">
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Harry Potter</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Lord Of The Rings</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Dungeons & Dragons</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Florida Man</p>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card-wrapper container-sm d-flex  justify-content-around">
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Harry Potter</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Lord Of The Rings</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Dungeons & Dragons</p>
                </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="img-fluid">
                <div class="card-body">
                  <p class="card-title text-center">Florida Man</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsTwo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsTwo" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>





<section id="faq" style="padding-top:3rem;">
  <div class="container mt-5">
    <div class="row justify-content-around align-items-center">
      <div class="col-md-6 d-block d-md-none text-center">
        <h4>FAQ</h4>
        <p>Want to know more? See the answers to our commonly asked questions</p>
      </div>
      <div class="col-md-4 d-none d-md-block">
        <h4>FAQ</h4>
        <p style="font-size:0.87rem;">Want to know more? See the answers to our commonly asked questions</p>
      </div>
      <div class="col-md-7 border-0">
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item mb-3">
          <h2 class="accordion-header border-0" id="panelsStayOpen-headingOne">
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

<x-svb-footer></x-svb-footer>
@endsection
