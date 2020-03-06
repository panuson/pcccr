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
	<link rel="stylesheet" href="<?php echo $ws['BOF']?>plugins/datatables/dataTables.bootstrap4.css">
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
					<h1 class="m-0 text-dark">ภาพ Intro</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
						<li class="breadcrumb-item active">ภาพ Intro</li>
					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="control/command.php" method="POST" enctype="multipart/form-data" target="iframe" data-action="true">
                                <div class="form-group">  
                                    <label class="font-weight-bold">สถานะการแสดงผล</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" class="custom-control-input" id="customCheck1" value="1" <?php if($status==1){echo 'checked'; }?>>
                                        <label class="custom-control-label" for="customCheck1">เปิดการแสดงผล</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <div class="custom-control custom-radio mr-3">
                                            <input type="radio" id="customRadio1" name="type" class="custom-control-input" value="1" <?php if($type==1){ echo 'checked'; }?>>
                                            <label class="custom-control-label" for="customRadio1">ภาพที่อัพโหลด</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="type" class="custom-control-input" value="0" <?php if($type==0){ echo 'checked'; }?>>
                                            <label class="custom-control-label" for="customRadio2">ค่าเริ่มต้น</label>
                                            <a target="_blank" href="https://chiangraientersoft.com/intro/intro.jpg">ดูรูปค่าเริ่มต้น</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="validatedCustomFile" class="font-weight-bold">ภาพ Intro ใหม่</label>
                                    <div class="custom-file">
                                        <input name="filename1" type="file" data-type="jpg,jpeg,gif" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                        <div class="invalid-feedback">กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .gif *แนะนำรูปกว้าง 1200px*  ขนาดไม่เกิน 20mb เท่านั้น</div>
                                    </div>
                                    <?php if(!empty($filename)): ?>
                                    <div class="position-relative mt-3" style="max-width: 30%">
                                        <img src="../../filesAttach/intro/<?php echo $filename; ?>" width="100%" alt="">
                                        <button type="button" style="top: -10px; right: -10px;" data-delete="all" data-file="<?php echo $filename; ?>" class="position-absolute btn btn-danger btn-sm"><i class="icon">close</i></button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group text-center">
                                    <input class="btn btn-success btn-sm" value="บันทึก" type="submit" name="save" >
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<iframe src="" name="iframe" frameborder="0" class="d-none"></iframe>
	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?php echo $ws['BOF']?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo $ws['BOF']?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $ws['BOF']?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo $ws['BOF']?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $ws['BOF']?>plugins/alertify/alertify.min.js"></script>
	<!-- AdminLTE -->
	<script src="<?php echo $ws['BOF']?>dist/js/adminlte.js"></script>
	<!-- OPTIONAL SCRIPTS -->
	<script src="<?php echo $ws['BOF']?>dist/js/app.js"></script>
</body>
</html>
