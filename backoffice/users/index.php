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
					<h1 class="m-0 text-dark">จัดการผู้ใช้งาน</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
						<li class="breadcrumb-item active">จัดการผู้ใช้งาน</li>
					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
							<h4>แก้ไขข้อมูลผู้ใช้งาน</h4>
                            <form action="control/command.php" method="POST" enctype="multipart/form-data" target="iframe" data-action="true">
								<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
                                <div class="form-group">
                                    <label for="department">ชื่อหน่วยงาน</label>
                                    <input name="department" id="department" type="text" class="form-control" value="<?php echo $department?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="usr">ชื่อผู้ใช้งาน</label>
                                    <input name="usr" id="usr" type="text" class="form-control" value="<?php echo $user; ?>" required  <?php echo $readonly;?>>
                                </div>
                                <div class="form-group">
                                    <label for="pwd"><?php if(!empty($_GET['id'])){ echo 'เปลี่ยน'; }?>รหัสผ่าน</label>
                                    <input name="pwd" id="pwd" type="password" class="form-control" required>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="save" class="btn btn-sm btn-primary">บันทึก</button>
									<?php if(!empty($_GET['id'])) :?>
									<a href="./" class="btn btn-danger btn-sm">ยกเลิก</a>
									<?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
					<?php if(empty($_GET['id'])) :?>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-sm">
                                <thead>
                                    <th class="text-center">ชื่อผู้ใช้งาน</th>
                                    <th width="150" class="text-center">หน่วยงาน</th>
                                    <th width="150" class="text-center">ลบ</th>
                                </thead>
                                <tbody>
                                    <?php foreach ( $users->where( "where id<>1" )->all() as $key => $value ): ?>
                                    <tr id="<?php echo $value['id']; ?>">
                                        <td class="align-middle"><?php echo $value['user']; ?></td>
                                        <td class="align-middle"><?php echo $value['department']; ?></td>
                                        <td class="text-center align-middle">
											<a href="./?id=<?php echo $value['id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></a>
                                            <a href="javascript:void(0)" data-delete="all" data-id="<?php echo $value['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="ลบ" class="mx-1 btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<?php endif; ?>
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
