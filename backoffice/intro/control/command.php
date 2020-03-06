<?php
    require_once('../../../inc/config.inc.php');
    $intro = new Intro();
    if(isset($_POST['save'])){
        $array['status'] = $_POST['status'];
        $array['type']   = $_POST['type'];
        if(!empty($_FILES['filename1']['tmp_name'])){
            $part1     = "../../../filesAttach/intro/";
            $part2     = "../../../filesAttach/intro/thumbnail/";
            $size1     = 1200;
            $size2     = 300;
            $file_temp = $_FILES['filename1']['tmp_name'];
            $file_name = $_FILES['filename1']['name'];
            $file_type = $_FILES['filename1']['type'];
            $array['filename']  = $intro->imagesFile($file_temp,$file_name,$file_type,$part1,$part2,$size1,$size2);
        }
        $intro->update($array,1);
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./')</script>";
    }
    if(isset($_POST['delete'])){
        @unlink("../../../filesAttach/intro/{$_POST['file']}");
        @unlink("../../../filesAttach/intro/thumbnail/{$_POST['file']}");
        $array['filename'] = '';
        $intro->update($array,1);
        echo 'reload';
    }