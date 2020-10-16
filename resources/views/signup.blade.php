@extends('layout')
@section('content')
    <div class="site-section bg-light">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-1"></div>
          <div class="col-md-10 mb-5">
            <form method="POST" action="{{ route('register') }}" class="p-5 bg-white">
             @csrf
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input name="first_name" type="text" id="fname" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input name="last_name" type="text" id="lname" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Username</label> 
                  <input type="text" name="username" id="username" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Email Address</label> 
                  <input type="email" name="email" id="email" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Name</label> 
                  <input type="text" id="companyname" name="company_name" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Phone Number</label> 
                  <input type="Number" id="pnumber" name="cell" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Address</label> 
                  <input type="text" id="adress" name="address" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Region</label> 
                  <select class="form-control" name="region" id="" required="">
                        <option value="" disabled="">Select region</option>
                        <option value="">Asia</option>
                        <option value="">Asia/Pacific</option>
                        <option value="">Africa</option>
                        <option value="">Europe</option>
                        <option value="">Middle East</option>
                        <option value="">North America</option>
                        <option value="">South &amp; Central America</option>
                      </select>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black"  for="email">City</label> 
                  <input type="text" id="city" name="city" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">State</label> 
                  <input type="text" id="state" name="state" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Country</label> 
                  <select class="form-control" name="country" id="" required="">
                        <option value="" disabled="">Select country</option>
                        <option value="">Singapore</option>
                        <option value="">Malaysia</option>
                        <option value="">Indonesia</option>
                        <option value="">Timor Leste</option>
                      </select>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Zip / Postal Code</label> 
                  <input type="text" id="postcode" name="postal_code" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Password</label> 
                  <input type="password" name="password" id="pass1" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Re-type Password</label> 
                  <input type="password" name="password_confirmation" id="pass2" class="form-control" required="">
                </div>
              </div>

                  <input type="checkbox" id="agree" name="agree" value="agree" required="">
                  <label for="agree">I Agree to The Terms and Condition</label>

                  <div class="row form-group">
                    <input type="submit" value="Register" class="btn btn-primary btn-md text-white mb-3 mt-2">
                  </div>
              
  
            </form>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>

    @endsection
    