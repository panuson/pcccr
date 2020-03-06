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
						<li class="breadcrumb-item active"><?php echo $gtopic; ?></li>
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
                            <table id="example" class="table table-bordered table-sm">
                                <thead>
                                    <th class="text-center">หัวข้อ</th>
                                    <th width="150" class="text-center">อัพโหลดรูป</th>
                                    <th width="150" class="text-center">จัดการ</th>
                                </thead>
                                <tbody>
                                    <?php foreach ( $gallery->where( "where type=$type" )->orderBy( 'id', 'DESC' )->all() as $key => $value ): ?>
                                    <tr id="<?php echo $value['id']; ?>">
                                        <td class="align-middle"><a href="../../gallery-detail.php?id=<?php echo $value['id']; ?>"><?php echo $value['topic']; ?></a></td>
                                        <td class="text-center align-middle"><a href="./images.php?id=<?php echo $value['id']; ?>"><i class="fa fa-upload"></i> อัพโหลดรูป</a></td>
                                        <td class="text-center align-middle">
                                            <a href="./form.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="แก้ไข" class="mx-1 btn btn-warning btn-sm text-white btn-circle"><i class="fa fa-pen"></i></button>
                                            <a href="javascript:void(0)" data-delete="list" data-id="<?php echo $value['id']; ?>" data-file="<?php echo $value['filename']; ?>" data-toggle="tooltip" data-placement="bottom" title="ลบ" class="mx-1 btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
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
