<footer class="shadow bg-body-tertiary">
  <div class="container py-5">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 d-flex flex-column gap-3 mb-4 mb-md-0">
        <span class="d-flex flex-column gap-2">
          <h5 class="text-h5 fw-semibold">Seven Books</h5>
          <span class="text-tertiary">Stack up your knowledge further</span>
        </span>

        <div class="d-flex gap-3 items-center">
          <a href="#">
            <img src="{{ Vite::asset('resources/images/instagram.svg') }}" alt="Instagram" class="logo-sm">
          </a>

          <a href="#">
            <img src="{{ Vite::asset('resources/images/x.svg') }}" alt="X" class="logo-sm">
          </a>

          <a href="#">
            <img src="{{ Vite::asset('resources/images/github.svg') }}" alt="Github" class="logo-sm">
          </a>

          <a href="#">
            <img src="{{ Vite::asset('resources/images/youtube.svg') }}" alt="Youtube" class="logo-sm">
          </a>
        </div>
      </div>

      <div class="col-12 col-md-6 col-lg-5">
        <div class="row">
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <h5 class="text-h5 fw-semibold mb-3">General</h5>

            <div class="d-flex flex-column gap-2">
              <a href="#" class="text-tertiary text-none">About us</a>
              <a href="#" class="text-tertiary text-none">Contact us</a>
              <a href="#" class="text-tertiary text-none">See our blog</a>
              <a href="#" class="text-tertiary text-none">Promotions</a>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <h5 class="text-h5 fw-semibold mb-3">Help Center</h5>

            <div class="d-flex flex-column gap-2">
              <a href="#" class="text-tertiary text-none">Supported regions</a>
              <a href="#" class="text-tertiary text-none">FAQ</a>
            </div>
          </div>
        </div>
      </div>

      <div class="d-none d-lg-block col-lg-4">
        <h5 class="text-h5 fw-semibold mb-3">
          Sign up for the newsletter
        </h5>

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="input-group mb-3 shadow-sm">
          @csrf
          <input type="email" name="email" id="email" class="form-control px-3 py-2" placeholder="Enter your email here"
            required>
          <button type="submit" class="btn btn-primary">
            Register
          </button>
        </form>
      </div>
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