<?php
    require_once('../../../inc/config.inc.php');
    $slider = new Slider();

    if(isset($_POST['save'])){
        if(!empty($_FILES['filename1']['tmp_name'])){
            $part1     = "../../../filesAttach/slide/";
            $part2     = "../../../filesAttach/slide/thumbnail/";
            $size1     = 1200;
            $size2     = 300;
            $file_temp = $_FILES['filename1']['tmp_name'];
            $file_name = $_FILES['filename1']['name'];
            $file_type = $_FILES['filename1']['type'];
            $array['filename']  = $slider->imagesFile($file_temp,$file_name,$file_type,$part1,$part2,$size1,$size2);
        }
        $slider->create($array);
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./')</script>";
    }

    if(isset($_POST['delete'])){
        if(!empty($_POST['file'])){
            @unlink("../../../filesAttach/slide/{$_POST['file']}");
            @unlink("../../../filesAttach/slide/thumbnail/{$_POST['file']}");
        }
        $delete = $slider->where("WHERE id='{$_POST['id']}'")->delete();
        if($delete){
            echo 'true';
        }else{
            echo 'false';
        }
    }