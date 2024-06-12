@extends('layouts.app')

@section('title', "Account Information")

@section('main')

<nav>
    <div class="border-bottom border-3 p-4 d-flex justify-content-between">
        <a href="" ><i class="fa-solid fa-arrow-left" style="color:black; font-size: 30px;"></i></a>
        <a href="" class="fw-bold link-offset-2 link-underline link-underline-opacity-0" style="color:#1B1A56;">Logout</a>
    </div>
</nav>
<section class="container">
    <div class="row">
        <div class="col-12 col-lg-5 d-flex justify-content-center align-items-center">
        <div class="card border border-0" style="width: 18rem;">
            <!-- <img src="{{ Storage::url(auth()->user()->img) }}" alt="Image not available"> -->
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold" style="color:#1B1A56;">Shava Jaya</h5>
                <h7 class="card-text" style="color:#1B1A56;">shavajaya@gmail.com</h7>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-7">
        <div class="card-body p-5 mx-5">
            <div class="bg-primary px-5 pb-5 p-4 rounded-5">
                <div class="text-center">
                    <h3>Account Information</h3>
                </div>
                <div class="form-group bg-light text-danger px-4 py-3 my-4 rounded-4">
                    <label class="form-label" for="inputText"><h6 class="fw-bold" style="color:#1B1A56;">Name</h6></label>
                    <input type="text" class="form-control mb-1 border border-0" id="inputText" value="Shava Jaya">
                </div>
                <div class="form-group bg-light text-danger px-4 py-3 mb-4 rounded-4">
                    <label class="form-label" for="inputEmail"><h6 class="fw-bold" style="color:#1B1A56;">E-Mail</h6></label>
                    <input type="email" class="form-control mb-1 border border-0" id="inputEmail" value="shavajaya@gmail.com">
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group bg-light text-danger px-4 py-3 mb-4 rounded-4">
                            <label class="form-label" for="inputPassword"><h6 class="fw-bold" style="color:#1B1A56;">Password</h6></label>
                            <input type="password" class="form-control border border-0" id="inputPassword" value="********">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group bg-light text-danger px-4 py-3 mb-4 rounded-4">
                            <label class="form-label " for="inputRegion"><h6 class="fw-bold" style="color:#1B1A56;">Region</h6></label>
                            <input type="text" class="form-control border border-0" id="inputRegion" value="Indonesia">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection