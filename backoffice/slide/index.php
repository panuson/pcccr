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
					<h1 class="m-0 text-dark">ภาพสไลด์</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
						<li class="breadcrumb-item active">ภาพสไลด์</li>
					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="control/command.php" method="POST" enctype="multipart/form-data" target="iframe" data-action="true">
                                <div class="form-group">
                                    <label for="filename1">อัพโหลดรูปภาพ ( เฉพาะไฟล์ .jpg, .jpeg, .gif **เพื่อความสวยงามของแนะนำขนาด 870 x 315 pixel  )</label>
                                    <div class="input-group">
                                        <div class="custom-file flex-wrap">
                                            <input name="filename1" type="file" data-type="jpg,jpeg,gif" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                            <div class="invalid-feedback">กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .gif * ขนาดไม่เกิน 20mb เท่านั้น</div>
                                        </div>
                                        <div class="input-group-append">
                                            <input name="save" class="btn btn-outline-success" type="submit" id="validatedCustomFile" value="อัพโหลด">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ( $slider->all() as $key => $value ): ?>
                        <div class="col-3" id="<?php echo $value['id'] ?>">
                            <div class="card shadow mb-4">
                                <div class="card-img-top position-relative">
                                    <img style="object-fit: cover" src="../../filesAttach/slide/thumbnail/<?php echo $value['filename'] ?>" height="300" width="100%" alt="">
                                    <div style="right: -10px;top: -10px;" class="position-absolute">
                                        <button data-delete="all" data-id="<?php echo $value['id'] ?>" data-file="<?php echo $value['filename'] ?>" type="button" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
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
