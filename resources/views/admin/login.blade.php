<!DOCTYPE html>
<html lang="en">
<head>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  	<title>indomining marketplace admin</title>

  	<!-- CSS  -->
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
  	<link href="{{url('/')}}/assets/admin/css/materialize.css" rel="stylesheet" type="text/css">
  	<link href="{{url('/')}}/assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/assets/admin/css/style.css" rel="stylesheet" type="text/css"> 
	
</head>

<body>              
  
<div class="parallax-w">
	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col s12 center-align" style="margin-bottom: 50px;">
					
				</div>

				<div class="col m6 hide-on-small-and-down">
					<img class="center-block" src="{{url('/')}}/assets/img/logo/logo.png" style="width: 40%;" alt="">
					<h5 class="fontt" style="margin-top:50px; "><b>Indomining Marketplace</b></h5>
					<p class="">Site Description. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
				</div>
				
				<div class="col m1"></div>
				
 				<div class="col s12 m5 white-text">
 					<div class="card z-depth-3">
						<div class="card-content" style="height: 60px; background-color: #34495e;">
							<span class="card-title fontt center-align white-text" style="margin-top: -10px;"><b>Login</b></span>
						</div>
						<div class="card-content wow-text" style="padding-left: 40px; padding-right: 40px; padding-bottom: 10px;">
							<form action="" method="post">
								@csrf
								<div class="row">
									<div class="input-field col s12">
									  <input name="usern" type="text" class="validate" placeholder="">
									 <label for="icon_prefix">Email atau Username</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12" style="margin-top: 0px;">
									  <input name="passwd" type="password" class="validate" placeholder="">
									  <label for="icon_prefix">Password</label>
									</div>
									<div class="col s12 center-align" style="margin-bottom: 0px;">
										<center>
										{!! NoCaptcha::renderJs() !!}
										{!! NoCaptcha::display() !!}
										</center>
									</div>
								</div>
								<div class="row">
									<button type="submit" name="btn_login" class="col s12 btn btn-wangsit btn-large waves-effect" style="background-color: #34495e">Login</button>
								</div>

							</form>	
						</div>
					</div>
 				</div>
			</div>
			<div class="row white-text center-align grey-text">
				<div class="col s12 grey-text">
					Made with <b>&#x2764;	</b> by <a class="brown-text text-lighten-3" >Indomining Marketplace</a>	
				</div>
			</div>
		</div>
	</div>
</div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{url('/')}}/assets/admin/js/materialize.js"></script>
  <script src="{{url('/')}}/assets/admin/js/init.js"></script>
</html>

