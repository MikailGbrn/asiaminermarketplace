<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
		</ul>
	</nav>

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="<?php echo base_url() ?>assets/backend/index3.html" class="brand-link">
			<img src="<?php echo base_url() ?>assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light"><b>Admin</b></span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?php echo base_url() ?>assets/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#"><?php echo $this->session->userdata('identity') ?></a><a href="<?php echo base_url('auth/logout') ?>"><span class="btn btn-danger right badge ml-5">Logout</span></a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="<?php echo base_url('auth') ?>" class="nav-link active">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="../widgets.html" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								Widgets
								<span class="right badge badge-danger">New</span>
							</p>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>