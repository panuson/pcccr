<?php

    require_once('../../../inc/config.inc.php');
    $news     = new News();
    $news_type = new News_Type();
    if(isset($_POST['save'])){
        $array['topic']     = $_POST['topic'];
        $array['type']      = $_POST['type'];
        $array['detail']    = $_POST['detail'];
        $array['postdate']  = $_POST['postdate'];

        if($_SESSION['ssid']<>1)
        {
            $array['user_id'] = $_SESSION['ssid'];
        }

        if(!empty($_FILES['filename1']['tmp_name'])){
            if(!empty($_POST['id'])){
                @unlink("../../../filesAttach/news/thumbnail/".$_POST['oldfile']);
                @unlink("../../../filesAttach/news/".$_POST['oldfile']);
            }
            $part1     = "../../../filesAttach/news/";
            $part2     = "../../../filesAttach/news/thumbnail/";
            $size1     = 1200;
            $size2     = 300;
            $file_temp = $_FILES['filename1']['tmp_name'];
            $file_name = $_FILES['filename1']['name'];
            $file_type = $_FILES['filename1']['type'];
            $array['filename']  = $news->imagesFile($file_temp,$file_name,$file_type,$part1,$part2,$size1,$size2);
        }else{
            if(!empty($_POST['oldfile'])){
                $array['filename'] = $_POST['oldfile'];
            }else{
                $array['filename'] = '';
            }
        }
        if(!empty($_POST['id'])){
            $news->update($array,$_POST['id']);
        }else{
            $news->create($array);
        }
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./?type={$_POST['type']}')</script>";
    }

    if(isset($_POST['delete'])){
        if(!empty($_POST['file'])){
            @unlink("../../../filesAttach/news/thumbnail/".$_POST['file']);
            @unlink("../../../filesAttach/news/".$_POST['file']);
        }
        if($_POST['type'] == 'all')
        {
            $data = $news->where("WHERE type={$_POST['id']}")->all();
            foreach ($data as $key => $value) {
                if(!empty($value['filename']))
                {
                    @unlink("../../../filesAttach/news/thumbnail/".$value['filename']);
                    @unlink("../../../filesAttach/news/".$value['filename']);
                }
                $news->where("where id='{$value['id']}'")->delete();
            }
            $delete = $news_type->where("where id='{$_POST['id']}'")->delete();
        }
        else
        {
            $delete = $news->where("where id='{$_POST['id']}'")->delete();
        }
        if($delete){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    if(isset($_POST['Save_Cate']))
    {
        $array['topic'] = $_POST['topic'];
        if(empty($_POST['id']))
        {
            $news_type->create($array);
        }
        else
        {
            $news_type->update($array,$_POST['id']);
        }
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./list.php')</script>";
    }