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
						<li class="breadcrumb-item active"><?php echo $htype; ?><?php echo $gtopic; ?></li>
					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
                            <div class="">
                                <a href="./form.php?type=<?php echo $type; ?>" class="btn btn-primary btn-sm">
                                    <small><i class="fa fa-plus"></i> เพิ่ม<?php echo $gtopic; ?></small>
                                </a>
                            </div>
                        </div>
						<div class="card-body">
                            <form action="control/command.php" method="POST" enctype="multipart/form-data" target="iframe" data-action="true">
                                <input type="hidden" name="type" value="<?php echo $type; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="oldfile" value="<?php echo $filename; ?>">
                                <div class="form-group">
                                    <label for="topic">หัวข้อ</label>
                                    <input value="<?php echo $topic; ?>" name="topic" type="text" class="form-control form-control-sm" id="topic" placeholder="หัวข้อ" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="editor">รายละเอียด</label>
                                    <textarea class="form-control" name="detail" id="editor" cols="30" rows="3"><?php echo $detail; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <?php if ( !empty( $filename ) ): ?>
                                    <label for="filename1">อัพเดทไฟล์แนบ ( เฉพาะไฟล์ .jpg, .jpeg **แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น )</label>
                                    <div class="mb-3"><a target="_blank" href="../../filesAttach/gallery/<?php echo $filename; ?>"><i class="fa fa-file"></i> ดูไฟล์แนบ</a></div>
                                    <div class="custom-file">
                                        <input name="filename1" type="file" data-type="jpg,jpeg,gif" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                        <div class="invalid-feedback">กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .gif *แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น</div>
                                    </div>
                                    <?php else: ?>
                                    <label for="filename1">ไฟล์แนบ ( เฉพาะไฟล์ .jpg, .jpeg **แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น )</label>
                                    <div class="custom-file">
                                        <input name="filename1" type="file" data-type="jpg,jpeg,gif" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                        <div class="invalid-feedback">กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .gif *แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น</div>
                                    </div>
                                    <?php endif;?>
                                </div>
                                <div class="form-group">
                                    <label for="postdate">วันที่ : </label>
                                    <input id="postdate" name="postdate" style="width: 150px" value="<?php echo $postdate; ?>" class="d-inline-block form-control form-control-sm" type="date">
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" value="บันทึก" name="save" class="btn btn-success btn-sm">
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
	<script src="<?php echo $ws['BOF']?>plugins/tiny/tinymce.min.js"></script>
	<script src="<?php echo $ws['BOF']?>dist/js/adminlte.js"></script>
	<!-- OPTIONAL SCRIPTS -->
	<script src="<?php echo $ws['BOF']?>dist/js/app.js"></script>
</body>
</html>
