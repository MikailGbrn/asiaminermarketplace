<div class="site-wrap">

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  @if(Request::path() === '/' || Request::path() === 'home')
    <header class="site-navbar position-fixed" role="banner">
  @else
    <header class="site-navbar site-navbar-nothome position-fixed" role="banner">
  @endif
      

    <div class="container">
      <div class="row align-items-center">
        
        <div class="col-md-9 d-none d-xl-block text-left">
          <h1 class="mb-0 site-logo"><a href="index.html" class="h2 mb-0" style="">{{$company->name}}</a></h1>
        </div>

        <div class="col-md-3"> 
          <div class="dropdown">
            <a class="float-right" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span style="color: grey">Welcome, </span> mufadho !
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="">Quotation</a>
              <a class="dropdown-item" href="">Setting</a>
              <a class="dropdown-item" href="http://localhost/asiaminermarketplace/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>
            </div>
          </div>
          <form id="logout-form" action="http://localhost/asiaminermarketplace/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="s1LLcWRsLvLLOMfxRz3JeFN1MkMxVmXiueEvGBCj">          
          </form>
        </div>
        

        
        </div>
      </div>
    </div>
    
  </header>