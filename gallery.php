<?php
    require_once './inc/config.inc.php';
    require_once './inc/controller.php';
    require_once './inc/function.php';
    $gallery = new Gallery();
    $gallery_img = new Gallery_Images();
if ( !empty( $_GET['type'] ) )
{
    $type     = $_GET['type'];
    $data     = $gallery->getById($type);
}
else
{

}

?>
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
    <link rel="stylesheet" type="text/css" href="assets/css/lightgallery.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css" rel="stylesheet"> 
    
    <title>โรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย Princess Science High School Chaingrai</title>
  </head>
  <body>

<?php require"header.php"?>
<section class="title-name py-5">
    <div class="container-xl">
    <h3><?php 
            if ($_GET['type']==1){
                echo 'กิจกรรม';
            }
            else{
                echo 'ข่าวประชาสัมพันธ์';
            }
            
            ?></h3>
    </div>
</section>
<section>
    <div class="container py-2 ">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white mb-0">
            <li class="breadcrumb-item"><a href="index.php" style="color:#4267b2;">หน้าหลัก</a></li>
            <li class="breadcrumb-item active" aria-current="page">
            <?php 
            if ($_GET['type']==1){
                echo 'กิจกรรม';
            }
            else{
                echo 'ข่าวประชาสัมพันธ์';
            }
            
            ?></li>
        </ol>
        </nav>
    </div>
</section>
<section>
    <div class="container-xl mb-5">
        <div class="card-deck">
            <?php GETHTML::GALLERY($type,3)?>
        </div>
    </div>
</section>
  
<?php require_once"footer.php"?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="slick/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="assets/js/lightgallery.min.js"></script>  
    <script type="text/javascript" src="assets/js/jquery.mousewheel.min.js"></script>  
    <script type="text/javascript" src="assets/js/lg-thumbnail.min.js"></script>
    <script type="text/javascript" src="assets/js/lg-fullscreen.min.js"></script>   
    <script type="text/javascript" src="assets/js/script.js"></script>
  </body>
</html>
