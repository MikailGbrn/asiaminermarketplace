<!-- Dropdown Test -->
<ul id="dropdown2" class="dropdown-content">
    {{-- <li><a href="#!" class="wangsit-text"><i class="material-icons">settings</i>Setting</a></li> --}}
       <!--  <li class="divider" tabindex="-1"></li> -->
    <li><a href="{{url('administrator/logout')}}" class="wangsit-text"><i class="material-icons">exit_to_app</i>Log Out</a></li>
  </ul>
<!-- Dropdown Test -->


<nav class="z-depth-0 transparent">
  <div class="nav-wrapper" style="background-color: #e9e9e9 !important">
    <div class="container">
      <!-- <a href="#" class="brand-logo fontt"><img class="center-align" src="asset/img/logoo.png" style="width: 150px; " alt=""></a> -->
      <ul class="right hide-on-med-and-down" style="margin-right: -80px;">
        <li><a href=""><i class="material-icons">apps</i></a></li>
        <li><a href="{{url('/')}}" target="_blank" class="waves-effect gradient-dara btn btn-small" style="padding: 0px 12px; border-radius: 25px;"><i class="material-icons left" style="margin-right: 3px ">language</i>Go to Website</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"><img class="circle" src="{{url('/')}}/assets/img/logo/logo.png" style="width: 40px; vertical-align:middle; margin-right: 10px; margin-top: -5px" alt="">Administrator<i class="material-icons right" style="margin-left: 10px;">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </div>
</nav>


<ul id="slide-out" class="sidenav sidenav-fixed z-depth-0 grey lighten-5" style="width: 270px;">
    <li>
        <div class="container center-align" style="margin-top: 20px;"><a href="{{url('/mimin/product')}}"><img class="" src="{{url('/')}}/assets/img/logo/logo.png" style="width: 130px;"></a></div>
    </li>
    
    

    <ul class="collapsible collapsible-accordion">
      <li style="margin-top: 15px;" class="font-dara"><a href="{{url('administrator/dashboard')}}"><i class="material-icons">dashboard</i><b>Dashboard</b></a></li>

      <li onmouseover="buka(this)" id="1" class="font-dara" style="margin-top: 15px;">
        <a class="collapsible-header"  style="padding-left: 31px ">Content<i class="material-icons">security</i><span class="material-icons" style="float: right; margin-top:12px;">
          keyboard_arrow_down
          </span></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="{{url('administrator/product')}}">Product</a></li>
            <li><a href="{{url('administrator/media')}}">Media / Resources</a></li>
            <li><a href="{{url('administrator/news')}}">News</a></li>
            <li><a href="{{url('administrator/project')}}">Project</a></li>
          </ul>
        </div>
      </li>

      <li style="margin-top: 15px;" class="font-dara"><a href="{{url('administrator/company')}}"><i class="material-icons">business</i>Company</a></li>

      <li style="margin-top: 15px;" class="font-dara"><a href="{{url('administrator/subscription')}}"><i class="material-icons">credit_card</i>Subscription</a></li>
      
      <li style="margin-top: 15px;" class="font-dara"><a href="{{url('administrator/user')}}"><i class="material-icons">contact_mail</i>User</a></li>
    </ul>


    
	   
    
    <li><div class="divider"></div></li>
    <li><a class="subheader">Setting</a></li>
    <li class="font-dara"><a href="{{url('administrator/logout')}}" class="wangsit-text"><i class="material-icons">exit_to_app</i>Log Out</a></li>
 </ul>