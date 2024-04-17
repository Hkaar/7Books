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
            <a class="nav-link cursor-pointer" href="#">About us</a>
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
            <button class="btn btn-secondary me-3">What is this?</button>
            <button class="btn btn-primary">Get Started </button>
        </div>
    </div>
    <div class="hero-brand">
        <img src="{{ URL::asset('assets/imgs/7books.png') }}" alt="">
    </div>
</section>
<section class="about">
    <div class="message">
        <h2>Who we are</h2>
        <p class="mb-1">We are a bunch of nerdy bookworm students that</p>
        <p class="mb-1">provide a easy way to borrow books from a library</p>
        <p class="mb-1">through an online platform</p>
    </div>
    <div class="message">
        <h2>Our Mission</h2>
        <p class="mb-1">Our mission is to provide an easy way for anyone to </p>
        <p class="mb-1">borrow books from their local library, and provide a </p>
        <p class="mb-1">way to read books from places that people forget </p>
        <p class="mb-1">nowadays</p>
    </div>
</section>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script defer src="{{ URL::asset('js/app.js'); }}"></script>
</body>
</html>