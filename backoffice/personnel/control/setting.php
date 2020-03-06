<?php

if ( empty( $_GET['type'] ) )
{
    header( "location: ../" );
}

$person     = new Personnel();
$person_row = new Personnel_Type();
$type       = $_GET['type'];
$data       = $person_row->getById( $type );
$ptopic     = $data['topic'];

$FID = $type;
