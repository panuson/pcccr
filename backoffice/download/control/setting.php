<?php
$cid         = ( !empty( $_GET['cid'] ) ? $_GET['cid'] : '' );
$type        = ( !empty( $_GET['type'] ) ? $_GET['type'] : '' );
$stype       = ( !empty( $_GET['stype'] ) ? $_GET['stype'] : '' );
$id          = '';
$topic       = '';
$filename    = '';
$selected    = 0;
$dl          = new Download(); // หัวข้อหลัก
$dl_type     = new Download_Type(); //หมวดหมู่
$dl_file     = new Download_File(); // ไฟล์ดาวน์โหลด
/*$dl_file_sub = new Download_File_Sub(); // ไฟล์ดาวน์โหลด*/
$adownload   = 'true';
if ( !empty( $_GET['id'] ) )
{
    $data     = $dl_file->getById( $_GET['id'] );
    $id       = $_GET['id'];
    $type     = $data['download_id'];
    $topic    = $data['topic'];
    $filename = $data['filename'];
    $url      = @$data['url'];
    $selected = $data['selected'];
    $htopic   = 'แก้ไขไฟล์ดาวน์โหลด';
}
else
{
    $htopic = 'เพิ่มไฟล์ดาวน์โหลด';
}
/*
if ( !empty( $_GET['sid'] ) )
{
    $data     = $dl_file_sub->getById( $_GET['sid'] );
    $id       = $_GET['sid'];
    $stype    = $data['type'];
    $topic    = $data['topic'];
    $filename = $data['filename'];
    $url      = $data['url'];
    $selected = $data['selected'];
    $htopic   = 'แก้ไขไฟล์ดาวน์โหลด';
}*/
if ( !empty( $stype ) )
{
    $data_stype  = $dl_file->getById( $stype );
    $dl_sub_type = $data_stype['topic'];
    $type        = $data_stype['download_id'];
}
if ( !empty( $type ) )
{
    $data_type = $dl->getById( $type );
    $dl_sub    = $data_type['topic'];
    $cid       = $data_type['type'];
}
if ( !empty( $cid ) )
{
    $dl_data  = $dl_type->getById( $cid );
    $dl_topic = $dl_data['topic'];
}
else
{

    $adownload_add = 'active';
}
$FID = $cid;
