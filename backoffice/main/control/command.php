<?php
    require_once('../../../inc/config.inc.php');
    $main     = new Main();
    if(isset($_POST['Save'])){
        $array['topic']     = $_POST['topic'];
        $array['detail']    = $_POST['detail'];
        $array['postdate']  = date("Y-m-d");
        $main->update($array,$_POST['id']);
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','')</script>";
    }
    if(isset($_POST['Save_Cate']))
    {
        $array['topic'] = $_POST['topic'];
        $array['postdate']  = date("Y-m-d");
        $main->create($array);
        echo "<script>window.top.success('บันทึกข้อมูลเรียบร้อยแล้ว','')</script>";
    }
    if (isset($_POST['delete'])) {
        $main->where("where id={$_POST['id']}")->delete();
        echo 'reload';
    }
    if (isset($_POST['sort']))
    {
        if ($_POST['sort']=='up')
        {
            $no = $_POST['no'] - 1;
        }
        else
        {
            $no = $_POST['no'] + 1;
        }
        if ($no > 0)
        {
            $data = $main->where("where no=$no")->find();
            if ( $data )
            {
                $arr['no']    = $_POST['no'];
                $newarr['no'] = $no;
                
                $main->update( $arr, $data['id'] );
                $main->update( $newarr, $_POST['id'] );
                
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
?>