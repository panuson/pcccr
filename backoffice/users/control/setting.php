<?php
    $users = new Admin();

    if(!empty($_GET['id']))
    {
        $data = $users->getById("{$_GET['id']}");
        $id   = $data['id'];
        $user = $data['user'];
        $department = $data['department'];
        $readonly = 'readonly';
    }

?>