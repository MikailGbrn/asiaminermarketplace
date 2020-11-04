@extends('layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-6">
            <h2>Contact Us
            </h2>
            <form>
              <div class="form-group">
                <label for="companyname">Company Name</label>
                <input type="text" name="companyname" id="companyname" class="form-control" placeholder="company name">
              </div>
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="first name">
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="last name">
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" class="form-control"></textarea>
              </div>
              <input type="submit" name="submit" class="btn btn-primary" style="width: 100%;">
            </form>
          </div>
          <div class="col-md-6 text-center pl-4"> 
            <h2>About This Site</h2>
            <p class="pl-4 mb-5"> Site Description. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Gedung Lokasi Perusahaan Terkait, Contoh 23E Lt 46, Jakarta, Indonesia</p>
            <p>(021)5930283</p>
          </div>
        </div>
      </div>
    </div>

    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
            <h2 class="mb-3 mt-0 text-white">Let's get started. Sign your company here!</h2>
            <p class="mb-0 text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
          <div class="col-lg-4">
            <p class="mb-0"><a href="{{url('/')}}/company/register" class="btn btn-outline-white text-white btn-md px-5 font-weight-bold btn-md-block">Sign Up As A Company</a></p>
          </div>
        </div>
      </div>
    </div>
@endsection