<?php
    require_once('../../../inc/config.inc.php');

    $users = new Admin();

    if(isset($_POST['save']))
    {
        $array['department'] = $_POST['department'];
        $array['pwd']        = md5($_POST['pwd']);
        

        if(empty($_POST['id']))
        {
            $array['user']       = $_POST['usr'];
            $array['usr']        = md5($_POST['usr']);
            $users->create($array);
        }
        else
        {
            $users->update($array,$_POST['id']);
        }
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','')</script>";
    }
    if(isset($_POST['delete']))
    {
        $users->where("where id={$_POST['id']}")->delete();
        echo 'reload';
    }
?>