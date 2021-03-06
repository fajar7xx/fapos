<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/pos.png'); ?>">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/vendor/fonts/circular-std/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/libs/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/vendor/charts/chartist-bundle/chartist.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/vendor/charts/morris-bundle/morris.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/vendor/charts/c3charts/c3.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

	<!-- datatables -->
	<link rel="stylesheet" href="<?= base_url('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">


	<title>FAPOS by Fajar Siagian</title>
</head>

<body>
	<!-- ============================================================== -->
	<!-- main wrapper -->
	<!-- ============================================================== -->
	<div class="dashboard-main-wrapper">
		<!-- ============================================================== -->
		<!-- navbar -->
		<!-- ============================================================== -->
		<div class="dashboard-header">
			<nav class="navbar navbar-expand-lg bg-white fixed-top">
				<a class="navbar-brand" href="<?= site_url('dashboard'); ?>">FA-POS</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse " id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto navbar-right-top">
						<li class="nav-item">
							<div id="custom-search" class="top-search-bar">
								<input class="form-control" type="text" placeholder="Search..">
							</div>
						</li>
						<li class="nav-item dropdown notification">
							<a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
							<ul class="dropdown-menu dropdown-menu-right notification-dropdown">
								<li>
									<div class="notification-title"> Notification</div>
									<div class="notification-list">
										<div class="list-group">
											<a href="#" class="list-group-item list-group-item-action active">
												<div class="notification-info">
													<div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
													<div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy
															Rakestraw</span>accepted your invitation to join the team.
														<div class="notification-date">2 min ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
													<div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is
														now following you
														<div class="notification-date">2 days ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
													<div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is
														watching your main repository
														<div class="notification-date">2 min ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
													<div class="notification-list-user-block"><span class="notification-list-user-name">Jessica
															Caruso</span>accepted your invitation to join the team.
														<div class="notification-date">2 min ago</div>
													</div>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<div class="list-footer"> <a href="#">View all notifications</a></div>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown nav-user">
							<a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/assets/images/avatar-1.jpg'); ?>" alt="" class="user-avatar-md rounded-circle"></a>

							<div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
								<div class="nav-user-info">
									<h5 class="mb-0 text-white nav-user-name"><?= $this->fungsi->user_login()->name; ?></h5>
									<span class="status"></span><span class="ml-2"><?= $this->fungsi->user_login()->username; ?></span>
								</div>
								<a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
								<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
								<a class="dropdown-item" href="<?= site_url('auth/logout'); ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- ============================================================== -->
		<!-- end navbar -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- left sidebar -->
		<!-- ============================================================== -->
		<div class="nav-left-sidebar sidebar-dark">
			<div class="menu-list">
				<nav class="navbar navbar-expand-lg navbar-light">
					<a class="d-xl-none d-lg-none" href="<?= site_url('dashboard'); ?>">Dashboard</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav flex-column">
							<li class="nav-divider">
								Menu
							</li>
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : ''; ?>" href="<?= site_url('dashboard'); ?>"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(1) == 'suppliers' ? 'active' : ''; ?>" href="<?= site_url('suppliers'); ?>"><i class="fas fa-fw fa-truck"></i></i>Suppliers</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(1) == 'customers' ? 'active' : ''; ?>" href="<?= site_url('customers'); ?>"><i class="fas fa-fw fa-users"></i>Customers</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'units' || $this->uri->segment(1) == 'items' ? 'active' : ''; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-fw fa-folder-open"></i>Products</a>
								<div id="submenu-4" class="collapse submenu">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" href="<?= site_url('category'); ?>">Categories</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="<?= site_url('units'); ?>">Units</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="<?= site_url('items'); ?>">Items</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(1) == 'stock' ? 'active' : ''; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-shopping-cart"></i>Transactions</a>
								<div id="submenu-5" class="collapse submenu">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" href="#">Sales</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="<?= site_url('stock/in'); ?>">Stock In</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="<?= site_url('stock/out'); ?>">Stock Out</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-chart-line"></i></i> Reports </a>
								<div id="submenu-6" class="collapse submenu">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" href="#">Sales</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Stocks</a>
										</li>
									</ul>
								</div>
							</li>

							<?php if ($this->fungsi->user_login()->level == 1) : ?>
								<li class="nav-divider">
									Settings
								</li>

								<li class="nav-item">
									<a class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : ''; ?>" href="<?= site_url('users'); ?>"><i class="fas fa-fw fa-user"></i></i>Users </a>


								</li>
							<?php endif; ?>
							<div class="nav-divider"></div>
							<a href="<?= site_url('auth/logout'); ?>" class="btn btn-brand text-white"> <i class="fas fa-fw fa-power-off mr-2"></i>Logout</a>
						</ul>
					</div>
				</nav>
			</div>
		</div>

		<!-- ============================================================== -->
		<!-- end left sidebar -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- wrapper  -->
		<!-- ============================================================== -->
		<?= $contents; ?>
		<!-- ============================================================== -->
		<!-- end wrapper  -->
		<!-- ============================================================== -->


	</div>
	<!-- ============================================================== -->
	<!-- end main wrapper  -->
	<!-- ============================================================== -->
	<!-- Optional JavaScript -->
	<!-- jquery 3.3.1 -->
	<script src="<?= base_url('assets/'); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	<!-- bootstap bundle js -->
	<script src="<?= base_url('assets/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<!-- slimscroll js -->
	<script src="<?= base_url('assets/'); ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
	<!-- main js -->
	<script src="<?= base_url('assets/'); ?>assets/libs/js/main-js.js"></script>
	<!-- chart chartist js -->
	<script src="<?= base_url('assets/'); ?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
	<!-- sparkline js -->
	<script src="<?= base_url('assets/'); ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
	<!-- morris js -->
	<script src="<?= base_url('assets/'); ?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
	<script src="<?= base_url('assets/'); ?>assets/vendor/charts/morris-bundle/morris.js"></script>
	<!-- chart c3 js -->
	<script src="<?= base_url('assets/'); ?>assets/vendor/charts/c3charts/c3.min.js"></script>
	<script src="<?= base_url('assets/'); ?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
	<script src="<?= base_url('assets/'); ?>assets/vendor/charts/c3charts/C3chartjs.js"></script>


	<!-- datatables-->
	<script src="<?= base_url('node_modules/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?= base_url('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
	<script>
		// datatablse inisialitation
		$(document).ready(function() {
			$('table.table-show').DataTable();
		});
		$(document).ready(function() {
			$('#table-item').DataTable({
				"processing": true,
				"serverSide": true,
				// "ajax": "scripts/server_processing.php"
				"ajax": {
					"url": "<?= site_url('items/get_ajax'); ?>",
					"type": "POST"
				}
			});
		});

		$(document).ready(function() {
			$(document).on('click', '#select', function() {
				var item_id = $(this).data('id');
				var barcode = $(this).data('barcode');
				var item_name = $(this).data('name');
				var unit = $(this).data('unit');
				var stock = $(this).data('stock');

				// isi value inputannya
				$('#item_id').val(item_id);
				$('#barcode').val(barcode);
				$('#item').val(item_name);
				$('#unit').val(unit);
				$('#stok').val(stock);

				// setelah selesai sembunyikan modal item
				$('#modal-item').modal('hide');
			});
		});

		$(document).ready(function() {
			$(document).on('click', '#detailbuttonmodal', function() {
				var barcode = $(this).data('barcode');
				var item_name = $(this).data('itemname');
				var supplier =$(this).data('suppliername');
				var qty = $(this).data('qty');
				var date = $(this).data('date');
				var detail = $(this).data('detail');

				// isi value inputannya
				$('#barcode').text(barcode);
				$('#itemName').text(item_name);
				$('#supplier').text(supplier);
				$('#qty').text(qty);
				$('#date').text(date);
				$('#detail').text(detail);

				// setelah selesai sembunyikan modal item
				// $('#modal-item').modal('hide');
			});
		});
	</script>
</body>

</html>