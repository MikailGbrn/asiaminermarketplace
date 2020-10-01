<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h4>Sign In</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="fname">Email</label>
                    <input type="text" name="email" id="fname" class="form-control">
                  </div>
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="lname">Password</label>
                    <input name="password" type="password" id="lname" class="form-control">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} value="rememberme">
                    <label for="rememberme">Remember Me</label>
                    @if (Route::has('password.request'))
                        <span style="float: right;"><a href="{{ route('password.request') }}">Forget Password?</a></span>
                    @endif
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="row form-group ">
                  <div class="col-md-12">
                    <input type="submit" value="Login" class="btn btn-primary btn-md text-white mb-3 mt-2">
                    <p><a href="{{ route('register') }}">Don't have an account?</a></p>
                  </div>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>