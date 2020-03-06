<?php
    $aintro   = 'active';
    $intro    = new Intro();
    $data     = $intro->getById(1);
    $status   = $data['status'];
    $type     = $data['type'];
    $filename = $data['filename'];