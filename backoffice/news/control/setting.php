<?php
$news = new News();

if ( !empty( $_GET['id'] ) )
{
    $htype    = 'แก้ไข';
    $id       = $_GET['id'];
    $data     = $news->getById( $id );
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

$news_type = new News_Type();
$news_type = $news_type->getById( $type );
$ntopic    = $news_type['topic'];

$FID = $type;
