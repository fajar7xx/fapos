<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="<?=base_url('assets/images/pos.png');?>">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/');?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url('assets/');?>assets/vendor/fonts/circular-std/style.css">
	<link rel="stylesheet" href="<?=base_url('assets/');?>assets/libs/css/style.css">
	<link rel="stylesheet" href="<?=base_url('assets/');?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link rel="stylesheet" href="<?=base_url('assets/');?>assets/vendor/charts/chartist-bundle/chartist.css">
	<link rel="stylesheet" href="<?=base_url('assets/');?>assets/vendor/charts/morris-bundle/morris.css">
	<link rel="stylesheet"
		href="<?=base_url('assets/');?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?=base_url('assets/');?>assets/vendor/charts/c3charts/c3.css">
	<link rel="stylesheet" href="<?=base_url('assets/');?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
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
				<a class="navbar-brand" href="index.html">FA-POS</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
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
							<a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span
									class="indicator"></span></a>
							<ul class="dropdown-menu dropdown-menu-right notification-dropdown">
								<li>
									<div class="notification-title"> Notification</div>
									<div class="notification-list">
										<div class="list-group">
											<a href="#" class="list-group-item list-group-item-action active">
												<div class="notification-info">
													<div class="notification-list-user-img"><img
															src="assets/images/avatar-2.jpg" alt=""
															class="user-avatar-md rounded-circle"></div>
													<div class="notification-list-user-block"><span
															class="notification-list-user-name">Jeremy
															Rakestraw</span>accepted your invitation to join the team.
														<div class="notification-date">2 min ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img
															src="assets/images/avatar-3.jpg" alt=""
															class="user-avatar-md rounded-circle"></div>
													<div class="notification-list-user-block"><span
															class="notification-list-user-name">John Abraham </span>is
														now following you
														<div class="notification-date">2 days ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img
															src="assets/images/avatar-4.jpg" alt=""
															class="user-avatar-md rounded-circle"></div>
													<div class="notification-list-user-block"><span
															class="notification-list-user-name">Monaan Pechi</span> is
														watching your main repository
														<div class="notification-date">2 min ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img
															src="assets/images/avatar-5.jpg" alt=""
															class="user-avatar-md rounded-circle"></div>
													<div class="notification-list-user-block"><span
															class="notification-list-user-name">Jessica
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
							<a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
									src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
							<div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
								aria-labelledby="navbarDropdownMenuLink2">
								<div class="nav-user-info">
									<h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
									<span class="status"></span><span class="ml-2">Available</span>
								</div>
								<a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
								<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
								<a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
					<a class="d-xl-none d-lg-none" href="#">Dashboard</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
						aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav flex-column">
							<li class="nav-divider">
								Menu
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fas fa-fw fa-truck"></i></i>Suppliers</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fas fa-fw fa-users"></i>Customers</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
									data-target="#submenu-4" aria-controls="submenu-4"><i
										class="fas fa-fw fa-folder-open"></i>Products</a>
								<div id="submenu-4" class="collapse submenu" style="">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" href="#">Categories</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Units</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Items</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
									data-target="#submenu-5" aria-controls="submenu-5"><i
										class="fas fa-fw fa-shopping-cart"></i>Transactions</a>
								<div id="submenu-5" class="collapse submenu" style="">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" href="#">Sales</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Stock IN</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Stock Out</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
									data-target="#submenu-6" aria-controls="submenu-6"><i
										class="fas fa-fw fa-chart-line"></i></i> Reports </a>
								<div id="submenu-6" class="collapse submenu" style="">
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
							<li class="nav-divider">
								Settings
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fas fa-fw fa-user"></i></i>Users </a>

							</li>
							<div class="nav-divider"></div>
							<a href="" class="btn btn-brand text-white"> <i
									class="fas fa-fw fa-power-off mr-2"></i>Logout</a>
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
		<?= $contents ;?>
		<!-- ============================================================== -->
		<!-- end wrapper  -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- end main wrapper  -->
	<!-- ============================================================== -->
	<!-- Optional JavaScript -->
	<!-- jquery 3.3.1 -->
	<script src="<?=base_url('assets/');?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	<!-- bootstap bundle js -->
	<script src="<?=base_url('assets/');?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<!-- slimscroll js -->
	<script src="<?=base_url('assets/');?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
	<!-- main js -->
	<script src="<?=base_url('assets/');?>assets/libs/js/main-js.js"></script>
	<!-- chart chartist js -->
	<script src="<?=base_url('assets/');?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
	<!-- sparkline js -->
	<script src="<?=base_url('assets/');?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
	<!-- morris js -->
	<script src="<?=base_url('assets/');?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
	<script src="<?=base_url('assets/');?>assets/vendor/charts/morris-bundle/morris.js"></script>
	<!-- chart c3 js -->
	<script src="<?=base_url('assets/');?>assets/vendor/charts/c3charts/c3.min.js"></script>
	<script src="<?=base_url('assets/');?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
	<script src="<?=base_url('assets/');?>assets/vendor/charts/c3charts/C3chartjs.js"></script>
	<script src="<?=base_url('assets/');?>assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>