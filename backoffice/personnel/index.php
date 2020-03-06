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
    <link rel="stylesheet" href="<?php echo $ws['BOF']?>dist/css/jquery.ui.css">
	<link rel="stylesheet" href="<?php echo $ws['BOF']?>dist/css/adminlte.css">
	<link rel="stylesheet" href="<?php echo $ws['BOF']?>dist/css/person.css">
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
					<h1 class="m-0 text-dark"><?php echo $ptopic?></h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
						<li class="breadcrumb-item active"><?php echo $ptopic?></li>
					</ol>
				</div>
			</div>
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-body">
                            <div class="">
                                <?php
                                    for ( $i = 1; $i <= $data['row']; $i++ ):
                                        if ( $i == '1' || $i == '2' ):
                                            $n        = 1;
                                            $sortable = '';
                                        else:
                                            $n        = 3;
                                            $sortable = 'id="list"';
                                        endif;
                                    ?>
                                <div style="margin:0;" <?php echo $sortable ?> class="item-list text-center">
                                    <?php
                                        for ( $x = 1; $x <= $n; $x++ ):
                                                $pdata = $person->where( "WHERE type='{$type}' AND row='$i' AND no='$x'" )->find();
                                                if ( $pdata['topic'] != "" ):
                                                    $name     = $pdata['topic'];
                                                    $position = $pdata['position'];
                                                    $drop     = 'drop';
                                                    $icon     = 'pen';
                                                    $class    = 'warning';
                                                    $tootip   = 'แก้ไข';
                                                else:
                                                    $name     = "--- ว่าง ---";
                                                    $position = "&nbsp;";
                                                    $drop     = '';
                                                    $icon     = 'plus';
                                                    $class    = 'success';
                                                    $tootip   = 'เพิ่ม';
                                                endif;
                                                if ( $pdata['status'] == 0 ): $c = ''; else: $c = 'checked'; endif;
                                                
                                                if ( $pdata['filename'] != "" ):
                                                    $img = "../../filesAttach/personnel/" . $pdata['filename'];
                                                else:
                                                    $img = '../../filesAttach/personnel/person.jpg';
                                                endif;
                                    ?>
                                    <div id="row<?php echo $i ?>-<?php echo $pdata['id'] ?>" class="box2 border">
                                        <div id="<?php echo $drop ?>" data-id="<?php echo $pdata['id'] ?>" data-row="<?php echo $i ?>" data-no="<?php echo $x ?>">
                                            <div class="img" style="background:url(<?php echo $img ?>);">
                                                <div class="action">
                                                    <a href="javascript:void(0)"
                                                    data-dialog="person"
                                                    data-row="<?php echo $i ?>"
                                                    data-no="<?php echo $x ?>"
                                                    data-pid="<?php echo $type ?>"
                                                    data-id="<?php echo $pdata['id'] ?>"
                                                    data-name="<?php echo $pdata['topic'] ?>"
                                                    data-position="<?php echo $pdata['position'] ?>"
                                                    data-img="<?php echo $pdata['filename'] ?>"
                                                    class="btn btn-<?php echo $class ?> rounded-circle btn-sm tootip text-white shadow"
                                                    data-tootip="<?php echo $tootip ?>">
                                                        <i class="fa fa-<?php echo $icon ?>"></i>
                                                    </a>
                                                <?php if ( $pdata['id'] != "" ):?>
                                                    <!--<div class="view">
                                                        <input onchange="person_show('<?php echo $pdata['id'] ?>','<?php echo $pdata['status'] ?>')" type="checkbox"  <?php echo $c ?>>
                                                        <span class="icon">view</span>
                                                    </div>-->
                                                    <a data-id="<?php echo $pdata['id'] ?>" data-file="<?php echo $pdata['filename'] ?>" data-del="all" href="javascript:void(0)" class="btn btn-danger rounded-circle btn-sm shadow">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <div class="name"><?php echo $name ?></div>
                                                <div class="position"><?php echo $position ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endfor; ?>
                                </div>
                                <?php endfor; ?>
                            </div>
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
    <script src="<?php echo $ws['BOF']?>plugins/jquery/jquery.ui.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo $ws['BOF']?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $ws['BOF']?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $ws['BOF']?>plugins/alertify/alertify.min.js"></script>
	<!-- AdminLTE -->
	<script src="<?php echo $ws['BOF']?>dist/js/adminlte.js"></script>
	<!-- OPTIONAL SCRIPTS -->
	<script src="<?php echo $ws['BOF']?>dist/js/app.js"></script>
    <script src="./js/script.js"></script>
    <script>
        $(document).ready(function(){
            dnd()
        })
    </script>
</body>
</html>
