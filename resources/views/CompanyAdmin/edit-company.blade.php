@extends('CompanyAdmin.layout')
@section('content')
<div class="site-section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <a href="{{url('/company-profile')}}"><span class="icon-arrow-left mr-3"></span>Go Back to Dashboard</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2>Edit Profile</h2>
        <div class="card mt-4">
          <div class="card-header">
            <h4>Basic Information</h4>
          </div>
          <div class="card-body"> 
            <form action="" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="custom-file col-md-5 mb-3">
                  <input type="file" name="header" id="header" accept="image/*">
                  <label for="header" class="custom-file-label"><span class="icon-image mr-3"></span>Upload Header Image</label>
                </div>
                <div class="col-md-2"></div>
                <div class="custom-file col-md-5 mb-5">
                  <input type="file" name="logo" id="logo" class="custom-file-input">
                  <label for="logo" class="custom-file-label"> <span class="icon-image mr-3"></span>Upload Profile Picture</label>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="fpdescription">Company's Description</label>
                  <textarea class="form-control" name="description" id="fpdescription" rows="2">{{$company->description}}</textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="website">Company's Website</label>
                  <input type="text" name="website" id="website" class="form-control" value="{{$company->website}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="website">Company's Business Hour</label>
                  <input type="text" name="business_hour" id="website" class="form-control" value="{{$company->business_hour}}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="email">Company's E-mail</label>
                  <input type="text" name="email" id="email" class="form-control" value="{{$company->email}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="website">Company's Phone</label>
                  <input type="tel" name="phone" id="website" class="form-control" value="{{$company->phone}}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                </div>
                <div class="form-group col-md-6" >
                  <button type="submit" class="btn btn-primary ml-5" style="float: right;">Save Changes</button>
                  <a href="{{url('/company-profile')}}" type="button" class="btn btn-secondary" style="float: right;">Cancel</a>
                </div>
              </div>
            </form>
<!--                 <label for="fpdescription">Front Page Description</label>
            <textarea name="fpdescription" rows="3" class="form-control mb-3" style="resize: none;" readonly="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </textarea>
            <label for="website" >Website</label>
            <textarea name="website" rows="1" class="form-control mb-3" style="resize: none;" readonly="">http://www.company.com</textarea>
            <label for="location" >Location</label>
            <textarea name="location" rows="1" class="form-control mb-3" style="resize: none;" readonly="">Jakarta, Indonesia</textarea>
            <label for="email" >E-mail</label>
            <textarea name="email" rows="1" class="form-control mb-3" style="resize: none;" readonly="">company@mail.com</textarea>
            <label for="phone" >Phone</label>
            <textarea name="phone" rows="1" class="form-control mb-3" style="resize: none;" readonly="">+1-23456-543</textarea> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
