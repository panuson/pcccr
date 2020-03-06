<?php
	require_once('../inc/config.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- prefetch && preload -->
	<link rel="preconnect" href="https://fonts.googleapis.com"">
	<link rel="dns-prefetch" href="https://fonts.googleapis.com"">
	<link rel="prefetch" href="plugins/datatables/dataTables.bootstrap4.css" as="style">
	<link rel="prefetch" href="plugins/datatables/jquery.dataTables.min.js" as="script">
	<link rel="prefetch" href="plugins/datatables/dataTables.bootstrap4.min.js" as="script">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>ระบบจัดการเว็บไซต์</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.css">
	

	<!-- Google Font: Source Sans Pro -->
	
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500&display=swap" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<!-- Navbar -->
	<?php require_once('./header.php'); ?>

	<!-- Main Sidebar Container -->
	<?php require_once('./menu.php'); ?>

 	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<h1 class="m-0 text-dark">แดชบอร์ด</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">แดชบอร์ด</li>
				</ol>
			</div>
		</div>

		<!-- Main content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
				</div>
			</div>
		</div>
	</div>
 
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>
</body>
</html>
