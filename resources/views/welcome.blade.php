<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seven Books</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }}">
</head>
<body>
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
            <h5>Looking for a way to read a book from a library? Use our </h5><h5>service to read books from your local library</h5>   
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
        <h2>Who we are</h2>
        <p class="mb-1">We are a bunch of nerdy bookworm students that <br>
        provide a easy way to borrow books from a library <br>
        through an online platform
        </p>
    </div>
    <div class="message">
        <h2 class="pt-3">Our Mission</h2>
        <p class="mb-1">Our mission is to provide an easy way for anyone to <br>
        borrow books from their local library, and provide a <br> way to read books
        from places that people forget <br> nowadays
        </p>
    </div>
</section>
<section class="books-showcase d-block justify-content-center align-items-center mb-5">
    <h3 class="text-left mt-5">Curently Trending</h3>
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
        <h3 class="text-left mt-5">Newly Released</h3>
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
<section class="faq d-flex justify-content-around align-items-center">
    <div class="message">
        <h4>FAQ</h4>
        <p>Want to know more? See the answers to our <br>
        commonly asked questions
        </p>
    </div>
    <div class="accordion flex-fill" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    What is Seven Books?
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    How do i do search a book?
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    How do i pickup a book
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    How do i rate a book
                </button>
            </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
        </div>
    </div>
</section>

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script defer src="{{ URL::asset('js/app.js'); }}"></script>
</body>
</html>