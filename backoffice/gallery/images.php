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
					<h1 class="m-0 text-dark"><?php echo $gtopic; ?></h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
                        <li class="breadcrumb-item"><a href="./?type=<?php echo $type; ?>"><?php echo $gtopic; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">อัพโหลดภาพอัลบั้ม : <?php echo $topic; ?></li>

					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="./?type=<?php echo $type; ?>" class="btn btn-danger btn-sm">
                                    <small><i class="fa fa-arrow-left"></i> ย้อนกลับ</small>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="control/command.php" method="POST" enctype="multipart/form-data" target="iframe" data-action="true">
                                <input type="hidden" name="type" value="<?php echo $type; ?>">
                                <input type="hidden" name="gallery_id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <label for="filename1">อัพโหลดรูปภาพ ( เฉพาะไฟล์ .jpg, .jpeg **แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น )</label>
                                    <div class="input-group">
                                        <div class="custom-file flex-wrap">
                                            <input name="filename1" type="file" data-type="jpg,jpeg,gif" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                            <div class="invalid-feedback">กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .gif *แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น</div>
                                        </div>
                                        <div class="input-group-append">
                                            <input name="upload" class="btn btn-outline-success" type="submit" id="validatedCustomFile" value="อัพโหลด">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach ( $gallery_img->where( "WHERE gallery_id='$id'" )->all() as $key => $value ): ?>
                        <div class="col-3" id="<?php echo $value['id'] ?>">
                            <div class="card shadow mb-4">
                                <div class="card-img-top position-relative">
                                    <img src="../../filesAttach/gallery/thumbnail/<?php echo $value['filename'] ?>" width="100%" alt="">
                                    <div style="right: -10px;top: -10px;" class="position-absolute">
                                        <button data-delete="img" data-id="<?php echo $value['id'] ?>" data-file="<?php echo $value['filename'] ?>" type="button" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-times"></i></button>
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
	<script src="<?php echo $ws['BOF']?>plugins/tiny/tinymce.min.js"></script>
	<script src="<?php echo $ws['BOF']?>dist/js/adminlte.js"></script>
	<!-- OPTIONAL SCRIPTS -->
	<script src="<?php echo $ws['BOF']?>dist/js/app.js"></script>
</body>
</html>
