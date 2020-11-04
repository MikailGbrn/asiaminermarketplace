
<!DOCTYPE html>
<html lang="en">
  @include('CompanyAdmin.fragment.style')
    
  <body class="bg-light">

    <div class="site-section">
      <div class="container">
        <div class="row mt-5">
          {{-- <div class="row">
            <div class="col-md-6">
              
            </div>
          </div --}}
          <div class="col-md-1"></div>
          <div class="col-md-10 mb-5">
            @if ($errors->any())
                    @foreach ($errors->all() as $error)
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$error}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endforeach
            @endif
            

            <form action="" method="post" class="p-5 bg-white">
              @csrf
              <div class="mb-4">
                <a href="{{url('/company/login')}}"><span class="icon-arrow-left mr-3"></span>Go Back to login</a>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mt-4">
                  <h4 style="text-align: left;"><b>Company User</b> </h4>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Name</label>
                  <input type="text" id="fname" name="name_user" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Username</label> 
                  <input type="text" id="username" name="username" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Email Address</label> 
                  <input type="email" id="email" name="email" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Password</label> 
                  <input type="password" name="password" id="pass1" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Re-type Password</label> 
                  <input type="password" id="pass2" name="password_confirmation" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mt-4">
                  <h4 style="text-align: left;"><b>Company Data</b> </h4>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Company Name</label> 
                  <input type="text" id="companyname" name="name" class="form-control" required="">
                </div>   
              </div>
              
              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Email</label> 
                  <input type="text" id="companyname" name="company_email" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Website</label> 
                  <input type="text" id="pnumber" name="company_website" class="form-control" required="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Business Hour</label> 
                  <input type="text" id="companyname" name="company_business_hour" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Phone Number</label> 
                  <input type="Number" id="pnumber" class="form-control" name="company_phone" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Address</label> 
                  <input type="text" id="adress" class="form-control" name="company_address" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Region</label> 
                  <select class="form-control" name="company_region" id="" required="">
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
                  <label class="text-black" for="email">City</label> 
                  <input type="text" id="city" name="company_city" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">State</label> 
                  <input type="text" id="state" name="company_province" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Country</label> 
                  <select class="form-control" name="company_country" id="" required="">
                        <option value="" disabled="">Select country</option>
                        <option value="">Singapore</option>
                        <option value="">Malaysia</option>
                        <option value="">Indonesia</option>
                        <option value="">Timor Leste</option>
                        <option value="">Tambahin dho wkwk</option>
                      </select>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Zip / Postal Code</label> 
                  <input type="text" id="postcode" name="company_postal_code" class="form-control" required="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Description</label> 
                  <textarea class="form-control" required="" name="company_description"></textarea>
                </div>
              </div>
                  <input type="checkbox" required="" id="agree" name="agree" value="agree">
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

    @include('CompanyAdmin.fragment.js')

  </body>
</html>