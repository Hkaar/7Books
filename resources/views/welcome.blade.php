@extends('layouts.app')

@section('title', "SevenBooks")

@section('main')
<nav class="navbar navbar-expand-lg">
  <section class="logo">
  <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="">
      <h2>Seven Books</h2>
  </section>
  <ul>
      <li><a href="#" class="link">Browse</a></li>
      <li><a href="#" class="link">About Us</a></li>
      <li><a href="#" class="link">Contact Us</a></li>
      <section class="account-buttons">
          <button>Login</button>
          <button>Register</button>
      </section>
  </ul>
</nav>
<section class="hero">
  <div class="left-frame">
      <div class="hero-message">
          <h1>Sail the Knowledge Seas</h1>
          <p>Looking for a way to read a book from a library?</p>
          <p> Use our service to read books from your local library</p>   
      </div>
      <section class="hero-buttons">
          <button>What is this?</button>
          <button>Get Started </button>
      </section>
  </div>
  <section class="hero-brand">
  <img src="{{ URL::asset('assets/imgs/7books.png') }}" alt="">
  </section>
</section>
<section class="about">
  <div class="message">
      <h2>Who we are</h2>
      <p>We are a bunch of nerdy bookworm students that</p>
      <p>provide a easy way to borrow books from a library</p>
      <p>through an online platform</p>
  </div>
  <div class="message">
      <h2>Our Mission</h2>
      <p>Our mission is to provide an easy way for anyone to </p>
      <p>borrow books from their local library, and provide a </p>
      <p>way to read books from places that people forget </p>
      <p>nowadays</p>
  </div>
</section>
<section class="books-showcase">
  <h3>Curently Trending</h3>
  <div class="books-slide">
      <div class="book">
      <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
          <h4>Harry Potter</h4>
      </div>
          <div class="book">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
              <h4>Lord of the Rings</h4>
          </div>
          <div class="book">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
              <h4>Dungeons & Dragons</h4>
          </div>
      <div class="book">
      <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
          <h4>Florida Man</h4>
      </div>
  </div>
  <h3>Newly Released</h3>
  <div class="books-slide">
      <div class="book">
      <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
          <h4>Harry Potter</h4>
      </div>
          <div class="book">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
              <h4>Lord of the Rings</h4>
          </div>
          <div class="book">
          <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
              <h4>Dungeons & Dragons</h4>
          </div>
      <div class="book">
      <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
          <h4>Florida Man</h4>
      </div>
  </div>
</section>
<section class="faq">
  <div class="faq-message">
      <h4>FAQ</h4>
      <p>Want to know more? See the answers to our</p>
      <p>commonly asked questions</p>
  </div>
  <div class="faq-content">
      <li>
          <label for="first">What is SevenBooks?<span>+</span></label>
          <input type="radio" name="accordion" id="first" checked>
              <div class="content">
                  <p>
                      SevenBooks, platform online yang mempersembahkan akses mudah dan inspiratif ke beragam pengetahuan melalui koleksi buku terbaru dan komunitas pembaca yang dinamis
                  </p>
              </div>
      </li>
      <li>
          <label for="second">How do i search for a book?<span>+</span></label>
          <input type="radio" name="accordion" id="second" checked>
              <div class="content">
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Nulla incidunt qui quos officiis laudantium ipsa, fugiat
                      quisquam obcaecati dolores porro?
                  </p>
              </div>
      </li>
      <li>
          <label for="third">How do i pick up a book?<span>+</span></label>
          <input type="radio" name="accordion" id="third" checked>
              <div class="content">
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Nulla incidunt qui quos officiis laudantium ipsa, fugiat
                      quisquam obcaecati dolores porro?
                  </p>
              </div>
      </li>
      <li>
          <label for="fourth">How do i rate a book?<span>+</span></label>
          <input type="radio" name="accordion" id="fourth" checked>
              <div class="content">
                  <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Nulla incidunt qui quos officiis laudantium ipsa, fugiat
                      quisquam obcaecati dolores porro?
                  </p>
              </div>
      </li>
  </div>
</section>
<footer>
  <div class="left-frame">
     <div class="footer-brand">
     <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="">
          <h2>Seven Books</h2>
     </div>
     <p>Sail through the sea of knowledge</p>
     <h4>Copyright © SevenBooks Team. All rights reserved.</h4>
  </div>
  <div class="right-frame">
      <h2>Explore</h2>
      <li>Terms of Service</li>
      <li>Privacy Policy</li>
      <li>Contact Us</li>
      <li>Supported Regions</li>
  </div>
</footer>
@endsection
=======

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script defer src="{{ URL::asset('js/app.js'); }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sevenbooks.com</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }}">
</head>
<body>
    <nav>
        <section class="logo">
        <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="">
            <h2>Seven Books</h2>
        </section>
        <ul>
            <li><a href="#" class="link">Browse</a></li>
            <li><a href="#" class="link">About Us</a></li>
            <li><a href="#" class="link">Contact Us</a></li>
            <section class="account-buttons">
                <button>Login</button>
                <button>Register</button>
            </section>
        </ul>
    </nav>
    <section class="hero">
        <div class="left-frame">
            <div class="hero-message">
                <h1>Sail the Knowledge Seas</h1>
                <p>Looking for a way to read a book from a library?</p>
                <p> Use our service to read books from your local library</p>   
            </div>
            <section class="hero-buttons">
                <button>What is this?</button>
                <button>Get Started </button>
            </section>
        </div>
        <section class="hero-brand">
        <img src="{{ URL::asset('assets/imgs/7books.png') }}" alt="">
        </section>
    </section>
    <section class="about">
        <div class="message">
            <h2>Who we are</h2>
            <p>We are a bunch of nerdy bookworm students that</p>
            <p>provide a easy way to borrow books from a library</p>
            <p>through an online platform</p>
        </div>
        <div class="message">
            <h2>Our Mission</h2>
            <p>Our mission is to provide an easy way for anyone to </p>
            <p>borrow books from their local library, and provide a </p>
            <p>way to read books from places that people forget </p>
            <p>nowadays</p>
        </div>
    </section>
    <section class="books-showcase">
        <h3>Curently Trending</h3>
        <div class="books-slide">
            <div class="book">
            <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                <h4>Harry Potter</h4>
            </div>
                <div class="book">
                <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                    <h4>Lord of the Rings</h4>
                </div>
                <div class="book">
                <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                    <h4>Dungeons & Dragons</h4>
                </div>
            <div class="book">
            <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                <h4>Florida Man</h4>
            </div>
        </div>
        <h3>Newly Released</h3>
        <div class="books-slide">
            <div class="book">
            <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                <h4>Harry Potter</h4>
            </div>
                <div class="book">
                <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                    <h4>Lord of the Rings</h4>
                </div>
                <div class="book">
                <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                    <h4>Dungeons & Dragons</h4>
                </div>
            <div class="book">
            <img src="{{ URL::asset('assets/imgs/book.jpg') }}" alt="">
                <h4>Florida Man</h4>
            </div>
        </div>
    </section>
    <section class="faq">
        <div class="faq-message">
            <h4>FAQ</h4>
            <p>Want to know more? See the answers to our</p>
            <p>commonly asked questions</p>
        </div>
        <div class="faq-content">
            <li>
                <label for="first">What is SevenBooks?<span>+</span></label>
                <input type="radio" name="accordion" id="first" checked>
                    <div class="content">
                        <p>
                            SevenBooks, platform online yang mempersembahkan akses mudah dan inspiratif ke beragam pengetahuan melalui koleksi buku terbaru dan komunitas pembaca yang dinamis
                        </p>
                    </div>
            </li>
            <li>
                <label for="second">How do i search for a book?<span>+</span></label>
                <input type="radio" name="accordion" id="second" checked>
                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nulla incidunt qui quos officiis laudantium ipsa, fugiat
                            quisquam obcaecati dolores porro?
                        </p>
                    </div>
            </li>
            <li>
                <label for="third">How do i pick up a book?<span>+</span></label>
                <input type="radio" name="accordion" id="third" checked>
                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nulla incidunt qui quos officiis laudantium ipsa, fugiat
                            quisquam obcaecati dolores porro?
                        </p>
                    </div>
            </li>
            <li>
                <label for="fourth">How do i rate a book?<span>+</span></label>
                <input type="radio" name="accordion" id="fourth" checked>
                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nulla incidunt qui quos officiis laudantium ipsa, fugiat
                            quisquam obcaecati dolores porro?
                        </p>
                    </div>
            </li>
        </div>
    </section>
    <footer>
        <div class="left-frame">
           <div class="footer-brand">
           <img src="{{ URL::asset('assets/imgs/logo.png') }}" alt="">
                <h2>Seven Books</h2>
           </div>
           <p>Sail through the sea of knowledge</p>
           <h4>Copyright © SevenBooks Team. All rights reserved.</h4>
        </div>
        <div class="right-frame">
            <h2>Explore</h2>
            <li>Terms of Service</li>
            <li>Privacy Policy</li>
            <li>Contact Us</li>
            <li>Supported Regions</li>
        </div>
    </footer>
</body>
</html>
