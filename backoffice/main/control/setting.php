<?php
    $main = new Main();
    if(!empty($_GET['id']))
    {
        $data   = $main->getById($_GET['id']);
        $id     = $data['id'];
        $topic  = $data['topic'];
        $detail = str_replace("\\",'',$data['detail']);
    }

?>