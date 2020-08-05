<!DOCTYPE html>
<html>

<?php $this->load->view('auth/back/meta') ?>

<!-- Site wrapper -->
<div class="wrapper">
	<?php $this->load->view('auth/back/nav') ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Dashboard</h1>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">

			<div class="container-fluid">

				<!-- =========================================================== -->
				<div class="row">
					<div class="col-lg-3 col-6">
						<!-- small card -->
						<div class="small-box bg-info">
							<div class="inner">
								<h3>150</h3>

								<p>New Orders</p>
							</div>
							<div class="icon">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small card -->
						<div class="small-box bg-success">
							<div class="inner">
								<h3>53<sup style="font-size: 20px">%</sup></h3>

								<p>Bounce Rate</p>
							</div>
							<div class="icon">
								<i class="ion ion-stats-bars"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small card -->
						<div class="small-box bg-warning">
							<div class="inner">
								<h3><?php echo $users_count ?></h3>

								<p>User Registrations</p>
							</div>
							<div class="icon">
								<i class="fas fa-user-plus"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small card -->
						<div class="small-box bg-danger">
							<div class="inner">
								<h3>65</h3>

								<p>Unique Visitors</p>
							</div>
							<div class="icon">
								<i class="fas fa-chart-pie"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
				</div>
				<!-- /.row -->

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Users</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
										<th><?php echo lang('index_fname_th'); ?></th>
										<th><?php echo lang('index_lname_th'); ?></th>
										<th><?php echo lang('index_email_th'); ?></th>
										<th><?php echo lang('index_groups_th'); ?></th>
										<th><?php echo lang('index_status_th'); ?></th>
										<th><?php echo lang('index_action_th'); ?></th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($users as $user) : ?>
										<tr>
											<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
											<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
											<td>
												<?php foreach ($user->groups as $group) : ?>
													<?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
												<?php endforeach ?>
											</td>
											<td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
											<td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
									<tfoot>
										<tr>
										<th><?php echo lang('index_fname_th'); ?></th>
										<th><?php echo lang('index_lname_th'); ?></th>
										<th><?php echo lang('index_email_th'); ?></th>
										<th><?php echo lang('index_groups_th'); ?></th>
										<th><?php echo lang('index_status_th'); ?></th>
										<th><?php echo lang('index_action_th'); ?></th>
										</tr>
									</tfoot>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->

		<?php $this->load->view('auth/back/footer') ?>

</html>