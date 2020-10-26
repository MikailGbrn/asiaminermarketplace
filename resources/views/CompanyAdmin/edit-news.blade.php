@extends('CompanyAdmin.layout')
@section('content')
<div class="site-section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <a href="dashboardnews.html"><span class="icon-arrow-left mr-3"></span>Go Back to Dashboard</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2>Edit News</h2>
        <div class="card mt-4">
          <div class="card-body"> 
            <form>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="newstitle">News Title</label>
                  <input type="text" name="newstitle" id="newstitle" class="form-control" placeholder="Add news title">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="author">Author</label>
                  <input type="text" name="author" id="author" class="form-control" placeholder="Add author">
                </div>
                <div class="form-group col-md-6">
                  <label for="newslocation">News Location</label>
                  <input type="text" name="newslocation" id="newslocation" class="form-control" placeholder="Jakarta, Indonesia">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="abstract">News' Abstract</label>
                  <textarea class="form-control" name="abstract" id="abstract" rows="3"></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="newsbody">News Body</label>
                  <textarea name="newsbody" id="newsbody" rows="4" class=""></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                </div>
                <div class="form-group col-md-6" >
                  <a href="#" type="button" class="btn btn-primary ml-5" style="float: right;">Save Changes</a>
                  <a href="dashboardnews.html" type="button" class="btn btn-secondary" style="float: right;">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
