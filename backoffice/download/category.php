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
					<h1 class="m-0 text-dark">เพิ่มหัวข้อไฟล์ดาวน์โหลด</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
                        <li class="breadcrumb-item active" aria-current="page">เพิ่มหัวข้อไฟล์ดาวน์โหลด</li>
					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="javascript:void(0)" data-action="category" data-add-topic="true" class="btn btn-primary btn-sm">
                                    <small><i class="fa fa-plus"></i> เพิ่มหัวข้อไฟล์ดาวน์โหลด</small>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-sm">
                                <thead>
                                    <th class="text-center">หัวข้อ</th>
                                    <th width="100" class="text-center">ลำดับ</th>
                                    <th width="100" class="text-center">แสดงผล</th>
                                    <th width="150" class="text-center">จัดการ</th>

                                </thead>
                                <tbody>
                                    <?php foreach ( $dl_type->where("where id=0")->orderBy( 'no', 'ASC' )->all() as $key => $value ): ?>
                                    <tr id="<?php echo $value['id']; ?>">
                                        <td class="align-middle"><a href="./?cid=<?php echo $value['id']; ?>"><?php echo $value['topic']; ?></a></td>
                                        <td class="text-center align-middle">
                                            <a href="javascript:void(0)" data-sort="<?php echo $value['id']; ?>" data-no="<?php echo $value['no']; ?>" data-type="category" data-action="up" class="btn btn-info btn-sm"><i class="fa fa-chevron-up"></i></a>
                                            <a href="javascript:void(0)" data-sort="<?php echo $value['id']; ?>" data-no="<?php echo $value['no']; ?>" data-type="category" data-action="down" class="btn btn-info btn-sm"><i class="fa fa-chevron-down"></i></a>
                                        </td>
                                        <td class="text-center align-middle">
                                        <div class="custom-control custom-switch">
                                            <input value="<?php echo $value['id']; ?>" data-show-cate type="checkbox" class="custom-control-input" id="customSwitch<?php echo $value['id']; ?>" <?php if ( $value['status'] == 1 ): echo 'checked';endif;?>>
                                            <label class="custom-control-label" for="customSwitch<?php echo $value['id']; ?>">สถานะ</label>
                                        </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="javascript:void(0)" data-action="category" data-add-topic="true" data-id="<?php echo $value['id'] ?>" data-topic="<?php echo $value['topic']; ?>" data-toggle="tooltip" data-placement="bottom" title="แก้ไข" class="mx-1 btn btn-warning btn-sm text-white"><i class="fa fa-pen"></i></a>
                                            <a href="javascript:void(0)" data-delete="all" data-id="<?php echo $value['id']; ?>" data-file="<?php echo $value['filename']; ?>" data-toggle="tooltip" data-placement="bottom" title="ลบ" class="mx-1 btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
    <script>
        $(document).on('change','[data-show-cate]',function(){
            var status = this.checked ? '1' : '0'
            var id = this.value
            $.ajax({
                url: './control/command.php',
                type: "POST",
                data: {
                    status: status,
                    id: id,
                    update_show_cate: true
                },
                success: function(res)
                {
                    console.log('true');
                }
            })
            console.log()
        })
    </script>
</body>
</html>
