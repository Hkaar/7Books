<footer class="bg-secondary pt-5">
  <div class="container mb-5">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 mb-3">
        <article class="mb-3">
          @auth
            <a href="{{ route('home') }}" class="text-h5 text-inherit fw-semibold text-none">
              Seven Books
            </a>
          @endauth

          @guest
            <a href="{{ route('/') }}" class="text-h5 text-inherit fw-semibold text-none">
              Seven Books
            </a>
          @endguest
        </article>
        
        <div class="row">
          <div class="col-12 col-md-6 mb-2 mb-md-0">
            <div class="d-flex flex-column gap-2">
              <a href="#" class="text-decoration-none text-inherit hover-text-greyed svb-transition-fast">Home</a>
              <a href="#" class="text-decoration-none text-inherit hover-text-greyed svb-transition-fast">Browse</a>
              <a href="#" class="text-decoration-none text-inherit hover-text-greyed svb-transition-fast">About us</a>
              <a href="#" class="text-decoration-none text-inherit hover-text-greyed svb-transition-fast">Contact us</a>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="d-flex flex-column gap-2">
              <a href="#" class="text-decoration-none text-inherit hover-text-greyed svb-transition-fast">Supported Regions</a>
              <a href="#" class="text-decoration-none text-inherit hover-text-greyed svb-transition-fast">FAQ</a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-12 col-md-6 col-lg-4">
        <h5 class="mb-3">Contact us</h5>

        <div class="d-flex gap-3 align-items-center mb-3">
          <a href="#"><i class="fa-brands fa-facebook fs-3 svb-transition-fast hover-grow active-shrink text-light"></i></a>
          <a href="#"><i class="fa-brands fa-instagram fs-3 svb-transition-fast hover-grow active-shrink text-light"></i></a>
          <a href="#"><i class="fa-brands fa-youtube fs-3 svb-transition-fast hover-grow active-shrink text-light"></i></a>
          <a href="#"><i class="fa-brands fa-whatsapp fs-3 svb-transition-fast hover-grow active-shrink text-light"></i></a>
        </div>

        <div class="d-flex align-items-center gap-1">
          <i class="fa-solid fa-envelope fs-5"></i>

          <span class="text-light">
            Hkaar@users.noreply.github.com
          </span>
        </div>
      </div>
      
      <div class="d-none d-lg-block col-lg-4">
        <h5 class="mb-3">Sign up for the newsletter</h5>

        <div class="input-group mb-3 shadow">
          <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email here">

          <button type="button" class="btn btn-primary">
            Register
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-primary py-3">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 mb-3 mb-md-0">
          <div class="d-flex align-items-center justify-content-start">
            <span class="fw-medium">Copyright &#169; 2024 Seven Books Team. All rights reserved.</span>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="d-flex gap-2 justify-content-md-end">
            <a href="#" class="text-decoration-none text-inherit svb-transition-fast hover-text-greyed">Terms of service</a>
    
            <a href="#" class="text-decoration-none text-inherit svb-transition-fast hover-text-greyed">Privacy Policy</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>