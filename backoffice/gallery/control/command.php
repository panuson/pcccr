<?php

    require_once('../../../inc/config.inc.php');
    $gallery     = new Gallery();
    $gallery_img = new Gallery_Images();

    if(isset($_POST['save'])){
        $array['topic']     = $_POST['topic'];
        $array['type']      = $_POST['type'];
        $array['detail']    = $_POST['detail'];
        $array['postdate']  = $_POST['postdate'];
        if(!empty($_FILES['filename1']['tmp_name'])){
            if(!empty($_POST['id'])){
                @unlink("../../../filesAttach/gallery/thumbnail/".$_POST['oldfile']);
                @unlink("../../../filesAttach/gallery/".$_POST['oldfile']);
            }
            $part1     = "../../../filesAttach/gallery/";
            $part2     = "../../../filesAttach/gallery/thumbnail/";
            $size1     = 1200;
            $size2     = 300;
            $file_temp = $_FILES['filename1']['tmp_name'];
            $file_name = $_FILES['filename1']['name'];
            $file_type = $_FILES['filename1']['type'];
            $array['filename']  = $gallery->imagesFile($file_temp,$file_name,$file_type,$part1,$part2,$size1,$size2);
        }else{
            if(!empty($_POST['oldfile'])){
                $array['filename'] = $_POST['oldfile'];
            }else{
                $array['filename'] = '';
            }
        }
        if(!empty($_POST['id'])){
            $gallery->update($array,$_POST['id']);
        }else{
            $gallery->create($array);
        }
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./?type={$_POST['type']}')</script>";
    }
    if(isset($_POST['upload'])){
        $array['gallery_id'] = $_POST['gallery_id'];
        if(!empty($_FILES['filename1']['tmp_name'])){
            $part1     = "../../../filesAttach/gallery/";
            $part2     = "../../../filesAttach/gallery/thumbnail/";
            $size1     = 1200;
            $size2     = 300;
            $file_temp = $_FILES['filename1']['tmp_name'];
            $file_name = $_FILES['filename1']['name'];
            $file_type = $_FILES['filename1']['type'];
            $array['filename']  = $gallery_img->imagesFile($file_temp,$file_name,$file_type,$part1,$part2,$size1,$size2);
        }
        $gallery_img->create($array);
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./images.php?id={$_POST['gallery_id']}')</script>";
    }
    if(isset($_POST['delete'])){
        if(!empty($_POST['file'])){
            @unlink("../../../filesAttach/gallery/thumbnail/".$_POST['file']);
            @unlink("../../../filesAttach/gallery/".$_POST['file']);
        }
        if($_POST['type']=='all'){
            foreach ($gallery_img->where("WHERE gallery_id='{$_POST['id']}'")->all() as $key => $value) {
                @unlink("../../../filesAttach/gallery/thumbnail/{$value['filename']}");
                @unlink("../../../filesAttach/gallery/{$value['filename']}");
                $gallery_img->where("where id='{$value['id']}'")->delete();
            }
            $delete = $gallery->where("where id='{$_POST['id']}'")->delete();
            
        }else{
            $delete = $gallery_img->where("where id='{$_POST['id']}'")->delete();
        }
        if($delete){
            echo 'true';
        }else{
            echo 'false';
        }
    }