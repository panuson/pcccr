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
	<h5 class="mb-4 text-center">กลุ่มสาระ</h5>
    <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">สาขาวิชาฟิสิกส์</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">สาขาวิชาเคมี</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชาชีววิทยา</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชาดาราศาสตร์</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">สาขาวิชาวิทยาศาสตร์ทั่วไป</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">สาขาวิชาคณิตศาสตร์</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชาศิลปะ</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชาสุขศึกษาและพลศึกษา</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชาการงานอาชีพ</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชาคอมพิวเตอร์</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชาภาษาต่างประเทศ</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชากิจกรรมพัฒนาผู้เรียน</a>
  </li>
  <li class="col-3 nav-item mb-3">
    <a class="nav-link btn btn-outline-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">สาขาวิชาสังคมศึกษา ศาสนา และวัฒนธรรม</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><?php require"org_dep/ict.php"?></div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><?php require"org_dep/ict.php"?></div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><?php require"org_dep/ict.php"?></div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><?php require"org_dep/ict.php"?></div>
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