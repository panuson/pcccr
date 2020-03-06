<?php
    require_once('../../../inc/config.inc.php');
    $person = new Personnel();
    $person_type = new Personnel_Type();
    if(isset($_POST['Save_Cate'])){
        $data = $person_type->orderBy('no','desc')->find();

        $array['topic'] = $_POST['topic'];
        $array['row']   = 15;
        $array['no']    = $data['no']+1;

        $person_type->create($array);
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','')</script>";

    }
    if(isset($_POST['dnd'])){
        if(isset($_POST['r1'])){
            $array['row'] = $_POST['r1'];
            $array['no']  = $_POST['no1'];
            $person->update($array,$_POST['id2']);
        }
        if(isset($_POST['r2'])){
            $array['row'] = $_POST['r2'];
            $array['no']  = $_POST['no2'];
            $person->update($array,$_POST['id1']);
        }
        echo "true";
    }
    if(isset($_POST['status'])){
        $array['status'] = $_POST['status'];
        $person->update($array,$_POST['id']);
        echo "true";
    }

    if(isset($_POST['save'])){
        $array['topic']     = $_POST['topic'];
        $array['position']  = $_POST['position'];
        $array['type']      = $_POST['type'];
        $array['row']       = $_POST['row'];
        $array['no']        = $_POST['no'];
        $array['status']    = 1;
        if(!empty($_FILES['filename1']['tmp_name'])){
            if(!empty($_POST['id'])){
                @unlink("../../../filesAttach/personnel/{$_POST['file_old']}");
                @unlink("../../../filesAttach/personnel/thumbnail/{$_POST['file_old']}");
            }
            $part1              = "../../../filesAttach/personnel/";
            $part2              = "../../../filesAttach/personnel/thumbnail/";
            $size1              = 500;
            $size2              = 300;
            $file_temp          = $_FILES['filename1']['tmp_name'];
            $file_name          = $_FILES['filename1']['name'];
            $file_type          = $_FILES['filename1']['type'];
            $array['filename']  = $person->imagesFile($file_temp,$file_name,$file_type,$part1,$part2,$size1,$size2);
            $array2['filename']  = $person->imagesFile($file_temp,$file_name,$file_type,$part1,$part2,$size1,$size2);
            //check file insert
        }else{
            if($_POST['file_old']<>""){
                $array['filename'] = $_POST['file_old'];
            }else{
                $array['filename'] = '';
            }
        }
        if(!empty($_POST['id'])){
            $array2['topic']     = $_POST['topic'];
            $array2['position']  = $_POST['position'];
            $person->update($array2,$_POST['id']);
        }else{
            $person->create($array);
        }
        echo "<script>window.top.alertify.confirm().close();</script>";
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','')</script>";
    }
    if(isset($_POST['deltype'])){
        if(!empty($_POST['file'])){
            @unlink("../../../filesAttach/personnel/{$_POST['file']}");
            @unlink("../../../filesAttach/personnel/thumbnail/{$_POST['file']}");
        }
        $person->where("WHERE id='{$_POST['id']}'")->delete();
        echo "true";
    }