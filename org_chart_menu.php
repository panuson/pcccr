<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- favicon -->
	<?php require_once"fav.php"?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css"> 
    <link rel="stylesheet" type="text/css" href="assets/css/org_chart.min.css">
    <title>โรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย Princess Science High School Chaingrai</title>
  </head>
  <body>

  <?php require_once"header.php"?>
<section class="title-name py-5">
    <div class="container-xl">
    <h3 class="text-center">บุคลากรกลุ่มครูผู้สอน</h3>
    </div>
</section>

<section>
    <div class="container-xl py-5">
	<h5 class="mb-5 text-center">กลุ่มสาระ</h5>
    <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">สาขาวิชาฟิสิกส์</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">สาขาวิชาเคมี</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">สาขาวิชาชีววิทยา</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">สาขาวิชาดาราศาสตร์</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="true">สาขาวิชาวิทยาศาสตร์ทั่วไป</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-6-tab" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-6" aria-selected="false">สาขาวิชาคณิตศาสตร์</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-7-tab" data-toggle="pill" href="#pills-7" role="tab" aria-controls="pills-7" aria-selected="false">สาขาวิชาศิลปะ</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-8-tab" data-toggle="pill" href="#pills-8" role="tab" aria-controls="pills-8" aria-selected="false">สาขาวิชาสุขศึกษาและพลศึกษา</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-9-tab" data-toggle="pill" href="#pills-9" role="tab" aria-controls="pills-9" aria-selected="false">สาขาวิชาการงานอาชีพ</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-10-tab" data-toggle="pill" href="#pills-10" role="tab" aria-controls="pills-10" aria-selected="false">สาขาวิชาคอมพิวเตอร์</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-11-tab" data-toggle="pill" href="#pills-11" role="tab" aria-controls="pills-11" aria-selected="false">สาขาวิชาภาษาต่างประเทศ</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-12-tab" data-toggle="pill" href="#pills-12" role="tab" aria-controls="pills-12" aria-selected="false">สาขาวิชากิจกรรมพัฒนาผู้เรียน</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-13-tab" data-toggle="pill" href="#pills-13" role="tab" aria-controls="pills-13" aria-selected="false">ภาษาไทย</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-14-tab" data-toggle="pill" href="#pills-14" role="tab" aria-controls="pills-14" aria-selected="false">สาขาวิชาสังคมศึกษา ศาสนา และวัฒนธรรม</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab"><?php require"org_dep/physics.php"?></div>
  <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab"><?php require"org_dep/chemical.php"?></div>
  <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab"><?php require"org_dep/biology.php"?></div>
  <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab"><?php require"org_dep/astronomy.php"?></div>
  <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab"><?php require"org_dep/science.php"?></div>
  <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab"><?php require"org_dep/math.php"?></div>
  <div class="tab-pane fade" id="pills-7" role="tabpanel" aria-labelledby="pills-7-tab"><?php require"org_dep/art.php"?></div>
  <div class="tab-pane fade" id="pills-8" role="tabpanel" aria-labelledby="pills-8-tab"><?php require"org_dep/health.php"?></div>
  <div class="tab-pane fade" id="pills-9" role="tabpanel" aria-labelledby="pills-9-tab"><?php require"org_dep/ct.php"?></div>
  <div class="tab-pane fade" id="pills-10" role="tabpanel" aria-labelledby="pills-10-tab"><?php require"org_dep/ict.php"?></div>
  <div class="tab-pane fade" id="pills-11" role="tabpanel" aria-labelledby="pills-11-tab"><?php require"org_dep/language.php"?></div>
  <div class="tab-pane fade" id="pills-12" role="tabpanel" aria-labelledby="pills-12-tab"><?php require"org_dep/activity.php"?></div>
  <div class="tab-pane fade" id="pills-13" role="tabpanel" aria-labelledby="pills-13-tab"><?php require"org_dep/thai.php"?></div>
  <div class="tab-pane fade" id="pills-14" role="tabpanel" aria-labelledby="pills-14-tab"><?php require"org_dep/social.php"?></div>
</div>
    </div>

</section>


<?php require_once"footer.php"?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script type="text/javascript" src="slick/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="slick/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>

  </body>
</html>