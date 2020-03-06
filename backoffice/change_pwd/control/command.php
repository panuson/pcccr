<?php
    require_once("../../../inc/config.inc.php");
    $admin = new Admin();
    if(isset($_POST['save'])){
        $pwd  = md5($_POST['pwd']);
        $data = $admin->where("WHERE pwd='$pwd'")->find();
        if($data){
            $array['pwd'] = md5($_POST['new_pwd']);
            $admin->update($array,1);
            echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./')</script>";
        }else{
            echo "<script>window.top.alert('กรุณาใส่รหัสผ่านเดิมให้ถูกต้อง')</script>";
        }
    }