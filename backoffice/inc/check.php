<?php
    require_once("../../inc/config.inc.php");
    if(isset($_POST['login'])){
        $admin = new Admin();
        $usr   = md5($_POST['usr']);
        $pwd   = md5($_POST['pwd']);
        $data  = $admin->where("WHERE usr='{$usr}' AND pwd='{$pwd}'")->find();
        if($data){
            $_SESSION['sess_usrid'] = session_id();
            $_SESSION['sess_usrname'] = $usr;
            $_SESSION['sess_password'] = $pwd;
            $_SESSION['ssid'] = $data['id'];
            echo "<script>window.top.location.replace('../')</script>";
        }else{
            echo "<script>window.top.error('ชื่อผู้ใช้งาน หรือ รหัสผ่านผิดพลาด')</script>";
        }
    }
?>