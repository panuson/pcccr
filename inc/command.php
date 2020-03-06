<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
require_once 'config.inc.php';
$hotline = new Hotline();
if ( isset( $_POST['save'] ) )
{
    $array['hl_id']    = $_POST['hl_id'];
    $array['name']     = $_POST['name'];
    $array['tel']      = $_POST['tel'];
    $array['email']    = $_POST['email'];
    $array['address']  = $_POST['address'];
    $array['type']     = $_POST['type'];
    $array['topic']    = $_POST['topic'];
    $array['detail']   = $_POST['detail'];
    $array['other']    = $_POST['other'];
    $array['postdate'] = date( "Y-m-d" );
    $array['ip']       = $_SERVER['REMOTE_ADDR'];
    $array['filename'] = '';
    for ( $i = 1; $i <= 5; $i++ )
    {
        if ( !empty( $_FILES["filename$i"]['tmp_name'] ) )
        {
            $part1     = "../filesAttach/hotline/";
            $part2     = "../filesAttach/hotline/thumbnail/";
            $size1     = 1200;
            $size2     = 300;
            $file_temp = $_FILES["filename$i"]['tmp_name'];
            $file_name = $_FILES["filename$i"]['name'];
            $file_type = $_FILES["filename$i"]['type'];
            $array['filename'] .= $hotline->imagesFile( $file_temp, $file_name, $file_type, $part1, $part2, $size1, $size2 ) . "|";
        }
        else
        {
            $array['filename'] .= '|';
        }
    }
    $hotline->create( $array );
    echo "<script>window.top.alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.top.location.replace('../hotline.php')</script>";
}

if ( isset( $_POST['save_report'] ) )
{
    $array['hl_id']    = $_POST['hl_id'];
    $array['name']     = $_POST['name'];
    $array['tel']      = $_POST['tel'];
    $array['email']    = $_POST['email'];
    $array['address']  = $_POST['address'];
    $array['topic']    = $_POST['topic'];
    $array['detail']   = $_POST['detail'];
    $array['other']    = $_POST['other'];
    $array['postdate'] = date( "Y-m-d" );
    $array['ip']       = $_SERVER['REMOTE_ADDR'];
    $array['filename'] = '';
    for ( $i = 1; $i <= 5; $i++ )
    {
        if ( !empty( $_FILES["filename$i"]['tmp_name'] ) )
        {
            $part1     = "../filesAttach/hotline/";
            $part2     = "../filesAttach/hotline/thumbnail/";
            $size1     = 1200;
            $size2     = 300;
            $file_temp = $_FILES["filename$i"]['tmp_name'];
            $file_name = $_FILES["filename$i"]['name'];
            $file_type = $_FILES["filename$i"]['type'];
            $array['filename'] .= $hotline->imagesFile( $file_temp, $file_name, $file_type, $part1, $part2, $size1, $size2 ) . "|";
        }
    }
    $hotline->create( $array );
    echo "<script>window.top.alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.top.location.replace('../report/')</script>";
}

if ( isset( $_POST['save_vote'] ) )
{
    $vote = new Vote();

    $ip   = $_SERVER['REMOTE_ADDR'];
    $date = date( "Y-m-d" );
    $data = $vote->where( "WHERE ip='$ip' AND postdate='$date'" )->find();

    if ( empty( $data ) )
    {
        $array['vote_id']  = $_POST['vote'];
        $array['ip']       = $ip;
        $array['postdate'] = $date;
        $vote->create( $array );
        echo "<script>window.top.alert('บันทึกข้อมูลคะแนนโหวตเรียบร้อยแล้ว');window.top.location.replace('../index.php')</script>";
    }
    else
    {
        echo "<script>window.top.alert('คุณได้ใช้สิทธิ์ลงคะแนนโหวตในวันนี้แล้ว')</script>";
    }
}