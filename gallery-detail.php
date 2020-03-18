<?php
    require_once './inc/config.inc.php';
    require_once './inc/controller.php';
    require_once './inc/function.php';
    $gallery = new Gallery();
    $gallery_img = new Gallery_Images();
if ( !empty( $_GET['id'] ) )
{
    $id       = $_GET['id'];
    $data     = $gallery->getById($id);
    $type     = $data['type'];
    $topic    = $data['topic'];
    $detail   = $data['detail'];
    $filename = $data['filename'];
    $postdate = $data['postdate'];
    $pageview = $data['pageview'];
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
    if ($type=1){
        echo 'ข่าวประชาสัมพันธ์';}
    else{
        echo 'กิจกรรม';
        }
        ?>
        </h3>
    </div>
</section>

<section>
    <div class="container-xl my-5">
    <h5 class="mb-5 text-center"><?php echo $topic?></h5>
        <div class="text-center">
            <img src="./filesAttach/gallery/<?php echo $filename;?>" class="mb-4 mx-auto"></img>
        </div>
            <?php echo $detail;?>
            <div class="row" id="lightgallery">
            <?php 
            foreach ( $gallery_img->where( "WHERE gallery_id='$id'" )->all() as $key => $value ){
                echo '
                <a href="./filesAttach/gallery/'. $value['filename'].'">
                    <div class="col-12 col-md-4 col-sm-6" >
                        <img src="./filesAttach/gallery/thumbnail/'. $value['filename'].'" class="mb-4 mx-auto img-thumbnail" ></img>
                    </div>
                </a>
                ';
            }
            ?>
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
