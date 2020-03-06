<?php

require_once '../../../inc/config.inc.php';
$dl_type = new Download_Type();
$dl      = new Download();
$dl_file = new Download_File();
$dl_file_sub = new Download_File_Sub();
if ( isset( $_POST['action'] ) )
{
    if ( $_POST['action'] == 'category' )
    {

        $data = $dl_type->where("where id=0")->all();
        if ( empty( $_POST['id'] ) )
        {
            foreach ( $data as $key => $value )
            {

                $array['no'] = $value['no'] + 1;
                $dl_type->update( $array, $value['id'] );
            }
        }

        $array['topic'] = $_POST['topic'];
        if ( !empty( $_POST['id'] ) )
        {
            unset( $array['no'] );
            $dl_type->update( $array, $_POST['id'] );
        }
        else
        {
            $array['no'] = 1;
            $array['status'] = 1;
            $dl_type->create( $array );
        }
    }
    elseif ( $_POST['action'] == 'sub' )
    {
        $data = $dl->where( "WHERE type='{$_POST['type']}'" )->all();
        if ( empty( $_POST['id'] ) )
        {
            foreach ( $data as $key => $value )
            {
                $array['no'] = $value['no'] + 1;
                $dl->update( $array, $value['id'] );
            }
        }

        $array['topic'] = $_POST['topic'];
        $array['type']  = $_POST['type'];
        $array['url']   = $_POST['url'];
        $array['target'] = $_POST['target'];
        if ( !empty( $_POST['id'] ) )
        {
            unset( $array['no'] );
            $dl->update( $array, $_POST['id'] );
        }
        else
        {
            $array['no'] = 1;
            $dl->create( $array );
        }
    }
    elseif ( $_POST['action'] == 'download_sub')
    {
        
        $array['topic'] = $_POST['topic'];
        $array['download_id']  = $_POST['type'];
        if ( !empty( $_POST['id'] ) )
        {
            $dl_file->update( $array, $_POST['id'] );
        }
        else
        {
            $array['folder'] = 1;
            $dl_file->create( $array );
        }
    }
    echo 'true';
}

if ( isset( $_POST['delete'] ) )
{
    if ( !empty( $_POST['file'] ) )
    {
        @unlink( "../../../filesAttach/download/{$_POST['file']}" );
        @unlink( "../../../filesAttach/download/thumbnail/{$_POST['file']}" );
    }
    if ( $_POST['type'] == 'all' )
    {
        $getData = $dl_type->getById( $_POST['id'] );
        $cdata   = $dl_type->where( "where dep=0 AND no>{$getData['no']}" )->all();
        foreach ( $cdata as $key => $value )
        {
            $id        = $value['id'];
            $arr['no'] = $value['no'] - 1;
            $dl_type->update( $arr, $id );
            unset( $arr['no'] );
        }
        $sub_data = $dl->where( "WHERE type='{$_POST['id']}'" )->all();
        foreach ( $sub_data as $key => $value )
        {
            foreach ( $dl_file->where( "WHERE download_id='{$value['id']}'" )->all() as $keys => $val )
            {
                if ( !empty( $val['filename'] ) )
                {
                    @unlink( "../../../filesAttach/download/{$val['filename']}" );
                    @unlink( "../../../filesAttach/download/thumbnail/{$val['filename']}" );
                }
                foreach ($dl_file_sub->where("WHERE type='{$val['id']}'")->all() as $key2 => $value2) {
                    if ( !empty( $value2['filename'] ) )
                    {
                        @unlink( "../../../filesAttach/download/{$value2['filename']}" );
                        @unlink( "../../../filesAttach/download/thumbnail/{$value2['filename']}" );
                    }
                    $dl_file_sub->where( "WHERE id='{$value2['id']}'" )->delete();
                }
                $dl_file->where( "WHERE id='{$val['id']}'" )->delete();
            }
            $dl->where( "WHERE id='{$value['id']}'" )->delete();
        }
        $dl_type->where( "WHERE id='{$_POST['id']}'" )->delete();
    }
    elseif ( $_POST['type'] == 'sub' )
    {
        $getData = $dl->getById( $_POST['id'] );
        $cdata   = $dl->where( "where type='{$getData['type']}' AND no>{$getData['no']}" )->all();
        foreach ( $cdata as $key => $value )
        {
            $id        = $value['id'];
            $arr['no'] = $value['no'] - 1;
            $dl->update( $arr, $id );
            unset( $arr['no'] );
        }
        $data = $dl_file->where( "WHERE download_id='{$_POST['id']}'" )->all();
        foreach ( $data as $key => $value )
        {
            if ( !empty( $value['filename'] ) )
            {
                @unlink( "../../../filesAttach/download/{$value['filename']}" );
                @unlink( "../../../filesAttach/download/thumbnail/{$value['filename']}" );
            }
            $data_sub = $dl_file_sub->where("WHERE type='{$value['id']}'")->all();
            foreach ($data_sub as $key2 => $value2) {
                if ( !empty( $value2['filename'] ) )
                {
                    @unlink( "../../../filesAttach/download/{$value2['filename']}" );
                    @unlink( "../../../filesAttach/download/thumbnail/{$value2['filename']}" );
                }
                $dl_file_sub->where( "WHERE id='{$value2['id']}'" )->delete();
            }
            $dl_file->where( "WHERE id='{$value['id']}'" )->delete();
        }
        $dl->where( "WHERE id='{$_POST['id']}'" )->delete();
    }
    elseif ( $_POST['type'] == 'file' )
    {
        $data = $dl_file_sub->where("WHERE type='{$_POST['id']}'")->all();
        foreach ($data as $key => $value) {
            if ( !empty( $value['filename'] ) )
            {
                @unlink( "../../../filesAttach/download/{$value['filename']}" );
                @unlink( "../../../filesAttach/download/thumbnail/{$value['filename']}" );
            }
            $dl_file_sub->where( "WHERE id='{$value['id']}'" )->delete();
        }
        $dl_file->where( "WHERE id='{$_POST['id']}'" )->delete();
    }
    elseif ( $_POST['type'] == 'sub_file' )
    {
        $dl_file_sub->where( "WHERE id='{$_POST['id']}'" )->delete();
    }
    echo 'true';
}

if ( isset( $_POST['save'] ) )
{
    $array['download_id'] = $_POST['download_id'];
    $array['topic']       = $_POST['topic'];
    $array['selected']    = $_POST['selected'];
    

    if($_POST['selected'] == 0)
    {
        if ( !empty( $_FILES['filename1']['tmp_name'] ) )
        {
            if ( !empty( $_POST['id'] ) )
            {
                @unlink( "../../../filesAttach/download/thumbnail/" . $_POST['oldfile'] );
                @unlink( "../../../filesAttach/download/" . $_POST['oldfile'] );
            }
            $part1             = "../../../filesAttach/download/";
            $part2             = "../../../filesAttach/download/thumbnail/";
            $size1             = 1200;
            $size2             = 300;
            $file_temp         = $_FILES['filename1']['tmp_name'];
            $file_name         = $_FILES['filename1']['name'];
            $file_type         = $_FILES['filename1']['type'];
            $array['filename'] = $dl_file->imagesFile( $file_temp, $file_name, $file_type, $part1, $part2, $size1, $size2 );
        }
        else
        {
            if ( !empty( $_POST['oldfile'] ) )
            {
                $array['filename'] = $_POST['oldfile'];
            }
            else
            {
                $array['filename'] = '';
            }
        }
    }else{
        $array['url'] = $_POST['url'];
    }

    if ( !empty( $_POST['id'] ) )
    {
        $dl_file->update( $array, $_POST['id'] );
    }
    else
    {
        $data = $dl_file->where("where download_id='{$_POST['download_id']}'")->all();
        foreach ($data as $item) {
            $update_array['no'] = $item['no']+1;
            $dl_file->update($update_array,$item['id']);
        }
        $array['no'] = 1;
        $dl_file->create( $array );
    }
    echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./list.php?type={$_POST['download_id']}')</script>";
}

if ( isset( $_POST['save_sub'] ) )
{
    $array['type'] = $_POST['type'];
    $array['topic']       = $_POST['topic'];
    $array['selected']    = $_POST['selected'];
    if($_POST['selected'] == 0)
    {
        if ( !empty( $_FILES['filename1']['tmp_name'] ) )
        {
            if ( !empty( $_POST['id'] ) )
            {
                @unlink( "../../../filesAttach/download/thumbnail/" . $_POST['oldfile'] );
                @unlink( "../../../filesAttach/download/" . $_POST['oldfile'] );
            }
            $part1             = "../../../filesAttach/download/";
            $part2             = "../../../filesAttach/download/thumbnail/";
            $size1             = 1200;
            $size2             = 300;
            $file_temp         = $_FILES['filename1']['tmp_name'];
            $file_name         = $_FILES['filename1']['name'];
            $file_type         = $_FILES['filename1']['type'];
            $array['filename'] = $dl_file->imagesFile( $file_temp, $file_name, $file_type, $part1, $part2, $size1, $size2 );
        }
        else
        {
            if ( !empty( $_POST['oldfile'] ) )
            {
                $array['filename'] = $_POST['oldfile'];
            }
            else
            {
                $array['filename'] = '';
            }
        }
    }else{
        $array['url'] = $_POST['url'];
    }

    
    
    if ( !empty( $_POST['id'] ) )
    {
        $dl_file_sub->update( $array, $_POST['id'] );
    }
    else
    {
        $dl_file_sub->create( $array );
    }
    echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','./download_sub.php?stype={$_POST['type']}')</script>";
}



if ( isset( $_POST['sort'] ) )
{
    if ( $_POST['sort'] == 'up' )
    {
        $no = $_POST['no'] - 1;
    }
    else
    {
        $no = $_POST['no'] + 1;
    }
    if ( $no > 0 )
    {
        if ( $_POST['type'] == 'category' )
        {
            $data = $dl_type->where( "where dep_id=0 AND no=$no" )->find();
        }
        elseif ( $_POST['type'] == 'sub' )
        {
            $data = $dl->where( "where type='{$_POST['type_id']}' AND no=$no" )->find();
        }
        elseif ($_POST['type'] == 'download'){
            $data = $dl_file->where("WHERE download_id='{$_POST['type_id']}' AND no=$no")->find();
        }
        if ( $data )
        {
            $arr['no']    = $_POST['no'];
            $newarr['no'] = $no;
            if ( $_POST['type'] == 'category' )
            {
                $dl_type->update( $arr, $data['id'] );
                $dl_type->update( $newarr, $_POST['id'] );
            }
            elseif ( $_POST['type'] == 'sub' )
            {
                $dl->update( $arr, $data['id'] );
                $dl->update( $newarr, $_POST['id'] );
            }
            elseif ( $_POST['type'] == 'download')
            {
                $dl_file->update( $arr, $data['id'] );
                $dl_file->update( $newarr, $_POST['id'] );
            }
            $json['status'] = 'true';
        }
        else
        {
            $json['status'] = 'หัวข้อที่คุณจะเลื่อนอยู่ล่างสุดแล้ว';
        }
    }
    else
    {
        $json['status'] = 'หัวข้อที่คุณจะเลื่อนอยู่บนสุดแล้ว';
    }
    echo json_encode( $json );
}

if(isset($_POST['update_show_cate']))
{
    $array['status'] = $_POST['status'];
    $dl_type->update( $array, $_POST['id'] );
    echo 'true';
}