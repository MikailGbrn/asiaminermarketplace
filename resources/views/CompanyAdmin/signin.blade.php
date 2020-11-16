
<!DOCTYPE html>
<html lang="en">
  @include('CompanyAdmin.fragment.style')
    
  <body class="bg-light">

    <div class="site-section">
      <div class="container mt-2">
        <div class="row">
          <div class="col-md-6">
            <h4 class="text-bold">Company Login</h4>
            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body"> 
                <form action="" method="post">
                  @csrf
                  @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Company</strong> create successfully !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  @if ($errors->any())
                    @foreach ($errors->all() as $error)
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Invalid credentials</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endforeach
                  @endif
                  
                  <div class="form-group">
                    <label for="companyemail">Company E-mail</label>
                    <input name="email" type="email" name="companyemail" id="companyemail" class="form-control" placeholder="company@mail.com">
                  </div>
                  <div class="form-group">
                    <label for="companypassword">Password</label>
                    <input type="password" name="password" id="companypassword" class="form-control" placeholder="">
                    <input type="checkbox" id="rememberme" name="rememberme" value="rememberme">
                    <label for="rememberme">Remember Me</label>
                    {{-- <span style="float: right;"><a href="#">Forget Password?</a></span> --}}
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-primary btn-md text-white mb-3 mt-2" style="width: 100%">
                    <p><a href="{{url('company/register')}}">Don't have a company account?</a></p>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center">
                <span ><a class="text-secondary" href="{{url('/')}}">Bring me back to the site</a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('CompanyAdmin.fragment.js')

  </body>
</html>