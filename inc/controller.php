<?php
class GETHTML
{
    public function MAIN_MENU( $type = null )
    {
        $main = new Main();
        $data = $main->OrderBy('no',"ASC")->all();
        foreach ( $data as $key => $value )
        {
            if ( $type == 'dropdown' )
            {
                echo '<a class="dropdown-item" href="' . $main->URL() . 'main.php?id=' . $value['id'] . '">' . $value['topic'] . '</a>';
            }
            else
            {
                echo '<a href="'.$main->URL().'main.php?id='.$value['id'].'" class="flex items-center p-2 text-gray-900 hover:bg-red-700 hover:text-white">
                        <img class="mr-2" src="'.$main->URL().'assets/images/icon-01.png">
                        <p>'.$value['topic'].'</p>
                    </a>';
            }
        }
    }
    public function PERSON_MENU( $type = null )
    {
        $person = new Personnel_Type();
        $data   = $person->orderBy( 'no', 'ASC' )->all();
        foreach ( $data as $key => $value )
        {
            if ( $type == 'dropdown' )
            {
                  
                echo '<a href="' . $person->URL() . 'personnel.php?id=' . $value['id'] . '" class="whitespace-no-wrap px-3 py-2 block text-black hover:bg-gray-400 cursor-pointer">' . $value['topic'] . '</a>';
            }
            else
            {
                echo '<a href="'.$person->URL().'personnel.php?id=' . $value['id'] . '" class="flex items-center p-2 text-gray-900 hover:bg-red-700 hover:text-white">
                        <img class="mr-2" src="'.$person->URL().'assets/images/icon-01.png">
                        <p>'.$value['topic'].'</p>
                    </a>';
            }
        }
    }
    public function DOWNLOAD_MENU()
    {
        $dl   = new Download_Type();
        $data = $dl->where( "where status=1" )->orderBy( 'no', 'asc' )->all();
        foreach ( $data as $key => $value )
        {
            echo '<a href="'.$dl->URL().'download.php?type=' . $value['id'] . '" class="flex items-center p-2 text-gray-900 hover:bg-red-700 hover:text-white">
                <img class="mr-2" src="'.$dl->URL().'assets/images/icon-01.png">
                <p>'.$value['topic'].'</p>
            </a>';
        }
    }
    public function NEWS( $type, $limit = null )
    {
        $news = new News();
        $data = $news->where( "WHERE type='$type'" )->orderBy( 'postdate', 'DESC' )->limit( $limit )->all();
        
        foreach ( $data as $key => $value )
        {
            echo '<a class="block hover:text-red-600 border-b py-3 border-gray-300" href="./news-detail.php?id='.$value['id'].'">
                    <p class="mb-1">'.$value['topic'].'</p>
                    <p class="text-xs text-gray-500">เมื่อวันที่ '.$news->datethai($value['postdate']).', เปิดอ่าน '.$value['pageview'].' ครั้ง</p>
                </a>';
        }
    }
    public function GALLERY( $type, $limit = null)
    {
        $gallery = new Gallery();
        $data = $gallery->where( "WHERE type = '$type'" )->orderBy( 'id', 'DESC' )->limit( $limit )->all();
        foreach ( $data as $key => $value )
        {
            echo '
            <div class="card sm-12">
                <img class="card-img-top" src="./filesAttach/gallery/'.$value['filename'].'" alt="Card image" style="width:100%">
                <div class="card-body">
                    <a href="gallery-detail.php?id='.$value['id'].'" class="stretched-link text-secondary text-menu-hover">
                        <p class="card-text mb-1">'.$value['topic'].'</p>
                    </a>
                    <small class="text-muted">'.$gallery->datethai($value['postdate']).'</small>
                </div>
            </div>';
        }
    }

    public function DOWNLOAD( $type , $limit = null , $showname = false )
    {
        $dl   = new Download();
        $data = $dl->where( "WHERE type=$type" )->orderBy( 'no', 'asc' )->limit($limit)->all();
        if($showname)
        {
            $data_dl = GETHTML::DOWNLOAD_TYPE( $type  );
            $topic =  " ( {$data_dl['topic']} )";
        }else{
            $topic = '';
        }
        foreach ( $data as $key => $value )
        {
            if($value['target']==1)
            {
                $target = 'target="_blank"';
            }
            if(empty($value['url'])):
            echo '<a href="./download-list.php?type=' . $value['id'] . '" class="p-3 border-b flex items-center hover:bg-red-700 hover:text-white">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                    <span>' . $value['topic'] .'</span>
                </a>';
            else:
                echo '<a href="'.$value['url'].'" '.$target.' class="p-3 border-b flex items-center hover:bg-red-700 hover:text-white">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>' . $value['topic'] .'</span>
                    </a>';
            endif;
        }
    }
    public function DOWNLOAD_FILE( $id )
    {
        $dl   = new Download_File();
        $data = $dl->where( "WHERE download_id=$id" )->orderBy( 'id', 'DESC' )->all();
        foreach ( $data as $key => $value )
        {
           
            if($value['selected']==0):
                echo '<a href="./filesAttach/download/' . $value['filename'] . '" class="pb-3 mb-3 border-b flex items-center" >
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>' . $value['topic'] . '</span>
                    </a>';
            else:
                echo '<a href="' . $value['url'] . '" class="pb-3 mb-3 border-b flex items-center"  target="_blank" >
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                    <span>' . $value['topic'] . '</span>
                </a>';
            endif;
        }
    }
    public function DOWNLOAD_FILE_SUB( $id )
    {
        $dl   = new Download_File_Sub();
        $data = $dl->where( "WHERE type=$id" )->orderBy( 'id', 'DESC' )->all();
        foreach ( $data as $key => $value )
        {
            if($value['selected']==0):
                echo '<a href="./filesAttach/download/' . $value['filename'] . '" class="item-news d-flex" target="_blank" >
                    <i class="fa fa-file-download"></i>&nbsp;
                    <span>' . $value['topic'] . '</span>
                </a>';
            else:
                echo '<a href="' . $value['url'] . '" class="item-news d-flex" target="_blank" >
                    <i class="fa fa-link"></i>&nbsp;
                    <span>' . $value['topic'] . '</span>
                </a>';
            endif;
            
        }
    }
    public function NEWS_TYPE( $type )
    {
        $news = new News_Type();
        $data = $news->getById( $type );
        return $data;
    }
    public function PERSON_TYPE( $id )
    {
        $person = new Personnel_Type();
        $data   = $person->getById( $id );
        return $data;
    }
    public function GALLERY_TYPE( $id )
    {
        $gallery = new Gallery_Type();
        $data    = $gallery->getById( $id );
        return $data;
    }
    public function DOWNLOAD_TYPE( $type, $sub = '0')
    {
        if ( $sub == '0' )
        {
            $dl = new Download_Type();
        }
        elseif($sub == '1')
        {
            $dl = new Download();
        }
        elseif($sub == '2')
        {
            $dl = new Download_File();
        }
        $data = $dl->where( "where id=$type" )->find();

        return $data;
    }
    public function SLIDER()
    {
        $slide = new Slider();
        $data  = $slide->all();
        foreach ( $data as $key => $value )
        {
            echo '<div><img src="./filesAttach/slide/' . $value['filename'] . '" width="100%" height="450"></div>';
        }
    }
    public function HOTLINE($hl_id=0){
        $hotline = new Hotline();
        $arr     = array("รอตรวจสอบ","รับเรื่องร้องเรียน","กำลังดำเนินการ","เสร็จสิ้น");
        $where   = "WHERE hl_id=$hl_id";
        $data    = $hotline->where($where)->orderBy('id','ASC')->all();
        $url = './detail.php';

        if(!$data){
            echo '<tr><td class="border px-4 py-2 text-center" colspan="4">:: ไม่พบข้อมูล ::</td></tr>';
        }
        foreach ($data as $key => $value) {
            $status = $value['status'];
            echo '<tr>
                    <td class="border px-4 py-2">'.$value["topic"].'</td>
                    <td class="border px-4 py-2 text-center"><a class="text-blue-500 hover:text-blue-700 hover:underline" href="'.$url.'?id='.$value["id"].'">รายละเอียด</a></td>
                    <td class="border px-4 py-2 text-center">'.$hotline->datethai($value["postdate"],true).'</td>
                    <td class="border px-4 py-2 text-center">'.$arr[$status].'</td>
                </tr>';
        }
    }
    public static function STAT()
    {
        $online  = new UserOnline();
        $counter = new Counter();

        $timeoutseconds = 100;
        $visitor        = $_SERVER['REMOTE_ADDR'];
        $timestamp      = time();
        $timeout        = $timestamp - $timeoutseconds;

        $array1['timestamp'] = $timestamp;
        $array1['visitor']   = $visitor;
        $online->create( $array1 );
        $online->where( "WHERE timestamp<'$timeout'" )->delete();
        $odata = $online->DISTINCT( 'visitor' );

        $cdata            = $counter->getById( 1 );
        $array['counter'] = $cdata['counter'] + 1;
        $counter->update( $array, 1 );

        echo "ผู้เข้าชม {$array['counter']} ครั้ง, ออนไลน์ขณะนี้ {$odata} คน";
    }
    
}
