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
					<h1 class="m-0 text-dark"><?php echo $dl_topic?></h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
                        <li class="breadcrumb-item"><a href="./?cid=<?php echo $cid; ?>"><?php echo $dl_topic ?></a></li>
                        <li class="breadcrumb-item"><a href="./list.php?type=<?php echo $type; ?>">จัดการไฟล์ : <?php echo $dl_sub ?></a></li>
                        <li class="breadcrumb-item"><a href="./download_sub.php?stype=<?php echo $stype; ?>">จัดการไฟล์ : <?php echo $dl_sub_type ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $htopic ?></li>
					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="./download_sub.php?stype=<?php echo $stype ?>" class="btn btn-danger btn-sm">
                                    <small><i class="fa fa-arrow-left"></i> ย้อนกลับ</small>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="control/command.php" enctype="multipart/form-data" method="POST" target="iframe">
                                <input type="hidden" name="type" value="<?php echo $stype ?>">
                                <input type="hidden" name="oldfile" value="<?php echo $filename; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                                <div class="form-row mb-3">
                                    <div class="custom-control custom-radio mr-2">
                                        <input type="radio" id="customRadio1" data-selected="0" name="selected" value="0" class="custom-control-input" <?php if ( $selected == 0 ): echo 'checked';endif;?>>
                                        <label class="custom-control-label" for="customRadio1">ใช้การสร้างข้อมูลอัพโหลดไฟล์</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" data-selected="1" name="selected" value="1" class="custom-control-input"  <?php if ( $selected == 1 ): echo 'checked';endif;?>>
                                        <label class="custom-control-label" for="customRadio2">ใช้การเชื่อมโยงลิงก์</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="topic">หัวข้อ</label>
                                    <input  name="topic" id="topic" type="text" value="<?php echo $topic; ?>" class="form-control form-control-sm" placeholder="หัวข้อ" required>
                                </div>
                                <div id="useSelected_file"  class="form-group <?php if ( $selected != 0 ): echo 'd-none';endif;?>">
                                    <?php if ( !empty( $filename ) ): ?>
                                    <label for="filename1">อัพเดทไฟล์แนบ ( เฉพาะไฟล์ .jpg, .jpeg, .pdf, .doc, .docx, .xls, .xlsx, .zip, .rar **แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น )</label>
                                    <div class="mb-3"><a href="../../filesAttach/download/<?php echo $filename; ?>"><i class="fa fa-file"></i> ดูไฟล์แนบ</a></div>
                                    <div class="custom-file">
                                        <input name="filename1" data-alert="กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .pdf, .doc, .docx, .xls, .xlsx, .zip, .rar" type="file" data-type="jpg,jpeg,gif,pdf,doc,docx,xls,xlsx,zip,rar" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                        <div class="invalid-feedback">กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .gif .pdf, .doc, .docx, .xls, .xlsx, .zip, .rar *แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น</div>
                                    </div>
                                    <?php else: ?>
                                    <label for="filename1">ไฟล์แนบ ( เฉพาะไฟล์ .jpg, .jpeg, .gif .pdf, .doc, .docx, .xls, .xlsx, .zip, .rar **แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น )</label>
                                    <div class="custom-file">
                                        <input name="filename1" data-alert="กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .pdf, .doc, .docx, .xls, .xlsx, .zip, .rar" type="file" data-type="jpg,jpeg,gif,pdf,doc,docx,xls,xlsx,zip,rar" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                        <div class="invalid-feedback">กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .pdf, .doc, .docx, .xls, .xlsx, .zip, .rar *แนะนำรูปกว้าง 1200px**  ขนาดไม่เกิน 20mb เท่านั้น</div>
                                    </div>
                                    <?php endif;?>
                                </div>
                                <div id="useSelected_link" class="form-group <?php if ( $selected != 1 ): echo 'd-none';endif;?>">
                                    <label for="url">ลิงก์</label>
                                    <input  name="url" id="url" type="text" value="<?php echo $url; ?>" class="form-control form-control-sm" placeholder="ลิงก์">
                                </div>
                                <div class="form-group text-center">
                                    <input name="save_sub" class="btn btn-success btn-sm" value="บันทึก" type="submit">
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
