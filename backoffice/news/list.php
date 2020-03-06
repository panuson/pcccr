<?php
    require_once('../../inc/config.inc.php');
    $news_type = new News_Type();
	if(!empty($_GET['eid']))
	{
        $data = $news_type->getById($_GET['eid']);

	}
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
					<h1 class="m-0 text-dark">จัดการหมวดหมู่</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
						<?php if(empty($_GET['eid'])): ?>
						<li class="breadcrumb-item active">สร้างหมวดหมู่</li>
						<?php else: ?>
						<li class="breadcrumb-item active">แก้ไข : <?php echo @$data['topic']; ?></li>
						<?php endif; ?>
					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="card mb-4">
						<div class="card-header">ฟอร์มหมวดหมู่</div>
						<div class="card-body">
                            <form method="POST" target="iframe" action="./control/command.php">
                                <input type="hidden" name="id" value="<?php echo @$data['id']; ?>">
								<div class="form-group">
									<div class="form-row align-items-center">
										<div class="w-auto mr-2">
											<label for="" class="mb-0">หัวข้อข้อมูลพื้นฐาน</label>
										</div>
										<div class="col">
											<input type="text" name="topic" class="form-control" value="<?php echo @$data['topic']; ?>">
										</div>
										<div class="w-auto ml-2">
											<button type="submit" name="Save_Cate" class="btn btn-success">
												<small>บันทึก</small>
											</button>
											<a href="./list.php" class="btn btn-danger">
												<small>ยกเลิก</small>
											</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="card">
						<div class="card-header">หมวดหมู่ทั้งหมด</div>
						<div class="card-body">
							<table id="example" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">ชื่อหมวดหมู่</th>
										<th data-orderable="false" class="text-center" width="15%">จัดการ</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($news_type->all() as $key => $value): ?>
									<tr>
										<td class="align-middle" >
											<a href="./?id=<?php echo $value['id']; ?>"><?php echo $value['topic'];?></a>
										</td>
										<td class="text-center">
											<a class="btn btn-sm btn-warning rounded-circle" href="./list.php?eid=<?php echo $value['id']; ?>">
												<i class="fal fa-pencil"></i>
											</a>
											<a class="btn btn-sm btn-danger rounded-circle" data-delete="all" data-id="<?php echo $value['id'];?>" href="javascript:void(0)">
												<i class="fal fa-trash"></i>
											</a>
										</td>
									</tr>
									<?php endforeach; ?>
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
