<?php
$gallery     = new Gallery();
$gallery_img = new Gallery_Images();
if ( !empty( $_GET['id'] ) )
{
    $htype    = 'แก้ไข';
    $id       = $_GET['id'];
    $data     = $gallery->getById( $id );
    $type     = $data['type'];
    $topic    = $data['topic'];
    $detail   = $data['detail'];
    $filename = $data['filename'];
    $postdate = $data['postdate'];
}
else
{
    $htype    = 'เพิ่ม';
    $type     = $_GET['type'];
    $postdate = date( 'Y-m-d' );
    $id       = '';
    $topic    = '';
    $detail   = '';
    $filename = '';
}
if ( empty( $type ) )
{
    header( "location: ../" );
}

$gallery_type = new Gallery_Type();
$gallery_type = $gallery_type->getById( $type );
$gtopic       = @$gallery_type['topic'];
$FID = $type;
