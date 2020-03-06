<?php
	require_once('../../inc/config.inc.php');
	require_once('./control/setting.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>ระบบจัดการเว็บไซต์</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?php echo $ws['BOF']?>plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo $ws['BOF']?>plugins/alertify/css/alertify.min.css">
    <link rel="stylesheet" href="<?php echo $ws['BOF']?>plugins/alertify/css/themes/default.min.css">
	<link rel="stylesheet" href="<?php echo $ws['BOF']?>dist/css/adminlte.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500&display=swap" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
	<div id="app" class="wrapper">
		<!-- Navbar -->
		<?php require_once('../header.php'); ?>

		<!-- Main Sidebar Container -->
		<?php require_once('../menu.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<h1 class="m-0 text-dark"><?php echo $topic; ?></h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
						<li class="breadcrumb-item active"><?php echo $topic; ?></li>
					</ol>
				</div>
			</div>

			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-body">
							<form action="./control/command.php" method="POST" target="iframe">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<div class="form-group">
									<label for="topic">หัวข้อ</label>
									<input class="form-control" name="topic" value="<?php echo $topic; ?>" type="text">
								</div>
								<div class="form-group">
									<label for="detial">รายละเอียด</label>
									<textarea name="detail" id="editor" cols="30" rows="10" class="form-control"><?php echo $detail; ?></textarea>
								</div>
								<div class="text-right">
									<button type="submit" name="Save" class="btn btn-sm btn-primary">บันทึก</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<iframe src="" name="iframe" class="d-none" frameborder="0"></iframe>
	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?php echo $ws['BOF']?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo $ws['BOF']?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE -->
    <script src="<?php echo $ws['BOF']?>plugins/alertify/alertify.min.js"></script>
	<script src="<?php echo $ws['BOF']?>plugins/tiny/tinymce.min.js"></script>
	<script src="<?php echo $ws['BOF']?>dist/js/adminlte.js"></script>
	<!-- OPTIONAL SCRIPTS -->
	<script src="<?php echo $ws['BOF']?>dist/js/app.js"></script>
</body>
</html>
