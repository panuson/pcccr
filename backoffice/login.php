<!DOCTYPE html>
<html lang="en">
<head>
	<!-- prefetch && preload -->
	<link rel="preconnect" href="https://fonts.googleapis.com"">
	<link rel="dns-prefetch" href="https://fonts.googleapis.com"">
	<link rel="prefetch" href="plugins/datatables/dataTables.bootstrap4.css" as="style">
	<link rel="prefetch" href="plugins/datatables/jquery.dataTables.min.js" as="script">
	<link rel="prefetch" href="plugins/datatables/dataTables.bootstrap4.min.js" as="script">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>ระบบจัดการเว็บไซต์</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.css">
    <link rel="stylesheet" href="plugins/alertify/css/alertify.min.css">
    <link rel="stylesheet" href="plugins/alertify/css/themes/default.min.css">


	<!-- Google Font: Source Sans Pro -->
	
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500&display=swap" rel="stylesheet">
</head>
<body style="min-height: 100vh" class="bg-gradient-primary d-flex align-items-center">
    <div class="container">
        <div class="m-auto" style="max-width: 400px">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-dark mb-4">ระบบจัดการเว็บไซต์</h1>
                                </div>
                                <form action="./inc/check.php" method="post" class="user" target="iframe">
                                    <div class="form-group mb-4">
                                        <input type="text" name="usr" class="form-control rounded-pill form-control-user" aria-describedby="emailHelp" placeholder="ชื่อผู้ใช้งาน" autocomplete="off">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="password" name="pwd" class="form-control rounded-pill form-control-user" placeholder="รหัสผ่าน">
                                    </div>
                                    <input type="submit" name="login" class="btn btn-primary rounded-pill  btn-user btn-block" value="Login">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p class="text-muted small text-center mt-3 mb-0">Backoffice vers. 2</p>
                                    <p class="text-muted small text-center mb-0"><small>&copy; 2019</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe src="" class="d-none" name="iframe" frameborder="0"></iframe>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/alertify/alertify.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="dist/js/app.js"></script>
</body>
</html>
