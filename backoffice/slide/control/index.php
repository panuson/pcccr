<?php
require_once '../../inc/config.inc.php';
require_once './control/setting.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/vendor/alertify/css/alertify.min.css">
    <link rel="stylesheet" href="../../assets/vendor/alertify/css/themes/default.min.css">
    <link rel="stylesheet" href="../../assets/vendor/datatables/datatables_bs4.min.css">
    <link rel="stylesheet" href="../assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../assets/css/style.min.css">
</head>
<body>
    <div id="app">
        <div id="wrapper">
            <?php require_once '../menu.php'?>
            <div  id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php require_once '../header.php';?>
                    <div class="container-fluid">
                        <h4 class="mb-4 text-gray-800">ภาพสไลด์</h4>
                        <div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb small p-2">
                                    <li class="breadcrumb-item"><a href="../">แดชบอร์ด</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ภาพสไลด์</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form action="control/command.php" method="POST" enctype="multipart/form-data" target="iframe" data-action="true">
                                    <div class="form-group">
                                        <label for="filename1">อัพโหลดรูปภาพ ( เฉพาะไฟล์ .jpg, .jpeg, .gif **เพื่อความสวยงามของแนะนำขนาด 1920 x 655 pixel  )</label>
                                        <div class="input-group">
                                            <div class="custom-file flex-wrap">
                                                <input name="filename1" type="file" data-type="jpg,jpeg,gif" class="custom-file-input" id="validatedCustomFile" required>
                                                <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์...</label>
                                                <div class="invalid-feedback">กรุณาตรวจสอบไฟล์ของท่าน !! เฉพาะไฟล์ .jpg, .jpeg, .gif * ขนาดไม่เกิน 20mb เท่านั้น</div>
                                            </div>
                                            <div class="input-group-append">
                                                <input name="save" class="btn btn-outline-success" type="submit" id="validatedCustomFile" value="อัพโหลด">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ( $slider->all() as $key => $value ): ?>
                            <div class="col-3" id="<?php echo $value['id'] ?>">
                                <div class="card shadow mb-4">
                                    <div class="card-img-top position-relative">
                                        <img style="object-fit: cover" src="../../filesAttach/slide/thumbnail/<?php echo $value['filename'] ?>" height="300" width="100%" alt="">
                                        <div style="right: -10px;top: -10px;" class="position-absolute">
                                            <button data-delete="all" data-id="<?php echo $value['id'] ?>" data-file="<?php echo $value['filename'] ?>" type="button" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe src="" class="d-none" name="iframe" frameborder="0"></iframe>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/popper.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/alertify/alertify.min.js"></script>
    <script src="../../assets/vendor/datatables/datatables.min.js"></script>
    <script src="../../assets/js/backoffice.js"></script>
</body>
</html>
