<?php

class Commands extends Config{
    protected $db_conn;
    protected $tb_name;
    protected $where;
    protected $orderBy;
    protected $limit;
    public $fields;
    protected $keys;
    public $URL;
    public $BOF;
    public function __construct(){
        $this->db_conn = $this->connect();
    }
    public function get(){

    } 
    public function all(){
        try {

            $stmt = self::$pdo->prepare("SELECT * FROM $this->tb_name $this->where $this->orderBy $this->limit");
            $stmt->execute();
            $this->_data = $stmt->fetchAll();
            $this->where = '';
            return $this->_data;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
    }
    public function delete(){
        $SQL = "DELETE FROM $this->tb_name  $this->where";
        $stmt = self::$pdo->prepare($SQL);
        if($stmt->execute()){
            $this->where = '';
            return true;
        }else{
            return false;
        }

    }
    public function deleteAll(){
        $stmt = self::$pdo->prepare("SELECT * FROM $this->tb_name $this->where");
        $stmt->execute();
        $this->_data = $stmt->fetchAll();
        foreach ($this->_data as $key => $value) {
            $SQL = "DELETE FROM $this->tb_name WHERE id={$value['id']}";
            $stmt2 = self::$pdo->prepare($SQL);
            if($stmt2->execute()){
                return true;
            }else{
                return false;
            }

        }
    }
    public function update($array,$id){
        $params = array();
        $fields = implode('=?,',array_keys($array))."=?";
        foreach( $array as $key => $value ) $params[].=$value;
        $params[] .= $id;
        $SQL = "UPDATE $this->tb_name SET $fields WHERE id=? $this->where";
        $stmt = self::$pdo->prepare($SQL);
        if($stmt->execute($params)){
            $this->where = '';
            return true;
        }else{
            return 'false';
        }
    }
    public function create($array){
        $fields = implode(',',array_keys($array));
        $keys = ':'.implode(', :',array_keys($array));
        foreach( $array as $key => $value ) $params[":$key"]=$value;

        $SQL = "INSERT INTO $this->tb_name ($fields) VALUES ($keys)";
        $stmt = self::$pdo->prepare($SQL);
        if($stmt->execute($params)){
            return self::$pdo->lastInsertId();
        }else{
            return false;
        }
        echo $keys;
    }
    public function getById($id){
        $stmt = self::$pdo->prepare("SELECT * FROM $this->tb_name where id=? $this->orderBy");
        $stmt->execute(array($id));
        $this->_data = $stmt->fetch(PDO::FETCH_ASSOC);;
        return $this->_data;
    }
    public function find(){
        $stmt = self::$pdo->prepare("SELECT * FROM $this->tb_name $this->where $this->orderBy");
        $stmt->execute();
        $this->_data = $stmt->fetch(PDO::FETCH_ASSOC);;
        $this->where = '';
        return $this->_data;
    }
    public function where($cm){
        $this->where = $cm;
        return $this;
    }
    public function orderBy($field,$sort){
        $this->orderBy = 'order by '.$field.' '.$sort;
        return $this;
    }
    public function limit($start,$end=null){
        if($start){
            if($end){
                $end = ", $end";
            }
            $this->limit = "Limit $start $end";
        }
        return $this;
    }
    public function imagesFile($file_temp,$file_name,$file_type,$part1,$part2,$size1,$size2,$i=null){
        $string = ""; // String
        if($file_name<>""){
                    $rename =time().$i; 
                    $ext = explode('.',$file_name);
                    $ext = end($ext);
                    $ext = strtolower($ext);
                    if ($ext=="jpg" or $ext=="jpeg") {

                                $newFile=$rename.".$ext";
                                copy($file_temp,"$part1$newFile");      

                            if ($ext=="jpg" or $ext=="jpeg") {
                                    $ori_img = imagecreatefromjpeg($file_temp);
                            }else{  
                                    $ori_img = imagecreatefromgif($file_temp);
                            }
                                        $ori_size = getimagesize($file_temp);
                                        $ori_w = $ori_size[0]; 
                                        $ori_h = $ori_size[1];

                                            if ($ori_w >$size1) {
                                                    $new_w = $size1; 
                                                    $new_h = round(($new_w/$ori_w) * $ori_h);
                                                    $new_img= imagecreatetruecolor($new_w, $new_h);
                                                    imagecopyresized($new_img, $ori_img,0,0,0,0,$new_w, $new_h,$ori_w,$ori_h);
                                                    imagestring($new_img, 4, 68, 90, $string, imagecolorallocate($new_img, 0, 0, 0));
                                                    imagejpeg($new_img,"$part1$newFile");
                                                    imagedestroy($ori_img); 
                                                    imagedestroy($new_img); 
                                                }

                            $thumbDir = "$part2" ;
                            $thumbfile = $thumbDir . $newFile; 
                            list($w1, $h1) = getimagesize($part1.$newFile);
                            $quality = 100;
                            $w2 =$size2 ; 
                            $percent = $w2 / $w1 ;
                            $h2 = $h1 * $percent ;
                            $im = imageCreateTrueColor($w2, $h2);   
                                if($ext=="jpg" or $ext=="jpeg"){
                                    $im1 = imageCreateFromJpeg($part1.$newFile); 
                                }else if($ext=="gif" or $ext=="png"){
                                    $im1 = imageCreateFromgif($part1.$newFile); 
                                }
                            imageCopyResampled($im, $im1, 0, 0, 0, 0, $w2, $h2, $w1, $h1);
                            imagejpeg($im, $thumbfile , $quality);  # %
                            imageDestroy($im);
                            imageDestroy($im1);
                    }
                            if ($ext == "gif" or $ext=="png" or $ext=="doc" or $ext=="docx" or $ext=="pdf" or $ext=="zip" or $ext=="rar" or $ext=='xls' or $ext=='xlsx') {
                                $newFile=$rename.".$ext";
                                copy($file_temp,"$part1$newFile");  
                                if($ext == 'gif'){
                                    copy($file_temp,"$part2$newFile");  
                                }
                        }
            @unlink("$file_temp");      
        }
        return $newFile;        
    }
    function DISTINCT($field){
        try{
            $stmt = self::$pdo->prepare("SELECT DISTINCT $field FROM $this->tb_name");
            $stmt->execute();
            $this->_data = $stmt->rowCount();
            return $this->_data;
            
        } catch (Exception $e) {
            echo 'ERROR FUNCTION : '.$e->getMessage();
        }
    }
    function datethai($date,$mini=null){
        list($y,$m,$d) = explode("-",$date);
        if($mini==''){
            $arr = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        }else{
            $arr = array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        }
        $y = $y+543;
        $m = $arr[intval($m)];
        return $d.' '.$m.' '.$y;
    }
    function numrow(){
        try{
            $stmt = self::$pdo->prepare("SELECT * FROM $this->tb_name $this->where");
            $stmt->execute();
            $this->where = '';
            return $stmt->rowCount();
        } catch (Exception $e) {
            echo 'ERROR FUNCTION : '.$e->getMessage();
        }
    }
    /*function login($usr,$pwd){
        try {
            $stmt = self::$pdo->prepare("SELECT * FROM $this->tb_admin WHERE usr=:usr AND pwd=:pwd");
            $stmt->execute(array(':usr'=>md5($usr), ':pwd'=>md5($pwd)));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
              if($stmt->rowCount() > 0)
              {
                $_SESSION['sess_usrid'] = session_id();
                $_SESSION['sess_usrname'] = md5($usr);
                $_SESSION['sess_password'] = md5($pwd);
                $_SESSION['ssid'] = $userRow['id'];
                $_SESSION['menu'] = $userRow['menu'];
                $_SESSION['dep_id'] = $userRow[department];
                    return 'yes';
              }
        } catch (Exception $e) {
            //echo "ERROR FUNCTION : ".$e->getMessage();
        }
    }

    function logout(){
        session_destroy();
        echo "<script>location.replace('./')</script>";
    }

    function check_session(){
       $sess_usrid=$_SESSION[sess_usrid];
       $sess_usrname=$_SESSION[sess_usrname];
       $sees_pwd=$_SESSION[sess_password];
       $ssid=$_SESSION[ssid];
       $sslv=$_SESSION[sslv];
       if ($sess_usrid<>session_id() or $sess_usrname=="" or $ssid=="" or $sslv=="") {
           $sel = $this->select($this->tb_admin,"where pwd=?",array($sees_pwd));
           if($sel[id]==""){
               echo "<script>location.replace('".URL."backoffice/login.php')</script>";
           }
       } 
    }
    function check_permission(){
        // wait. . . .
    }
    function select($tb,$cm,$params=null){
        try {
            $this->connect();
            $stmt = self::$pdo->prepare("SELECT * FROM $tb $cm");
            if($params){
                if($stmt->execute($params)){
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }else{
                if($stmt->execute()){
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        } catch (Exception $e) {
            
        }
    }
    function select_fld($tb,$fld='*',$cm,$params=null){
        try {
            $this->connect();
            $stmt = self::$pdo->prepare("SELECT $fld FROM $tb $cm");
            if($params){
                if($stmt->execute($params)){
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }else{
                if($stmt->execute()){
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        } catch (Exception $e) {
            
        }
    }
    function insert($tb,$fld,$params){
        try {
            $this->connect();
            $text = $fld;
            $arr = explode(",",$text);
            foreach ($arr as $str) {
                $text = str_replace($str,'?',$text);
            }
            $stmt = self::$pdo->prepare("INSERT INTO $tb ($fld) VALUES ($text)");
            if($stmt->execute($params)){
                return self::$pdo->lastInsertId();
            }else{
                return 'false';
            }

        } catch (Exception $e) {
            echo "ERROR FUNCTION : ".$e->getMessage();
        }
        self::$pdo = null;
    }
    function COUNTER_INS($tb,$fld,$tb2){
        try{
            $this->connect();
            $date = date('Y-m-d',strtotime("-1 day"));

            $select = self::$pdo->prepare("SELECT $date FROM $tb2 WHERE 1 AND DATE=$date");
            $select->execute();
            $row = $select->rowCount();

            $stmt = self::$pdo->prepare("INSERT INTO $tb ($fld) VALUES ('$date','$row')");
            $stmt->execute();
        } catch (Exception $e){
            echo "ERROR FUNCTION : ".$e->getMessage();
        }
        self::$pdo = null;
    }
    function update($tb,$cm,$params){
        try {
            $this->connect();
            $stmt = self::$pdo->prepare("UPDATE $tb SET $cm");
            if($stmt->execute($params)){
                return 'true';
            }else{
                return 'false';
            }
        } catch (Exception $e) {
             echo "ERROR FUNCTION : ".$e->getMessage();
        }
        self::$pdo = null;
    }
    
    function delete($tb,$id){
        try {
            $this->connect();
            $stmt = self::$pdo->prepare("DELETE FROM $tb WHERE id=?");
            $stmt->bindValue(1,$id);
            if($stmt->execute()){
                return 'true';
            }else{
                return 'false';
            }
        } catch (Exception $e) {
             echo "ERROR FUNCTION : ".$e->getMessage();
        }
    }
    function select_all($tb,$cm,$params=null){
        try {
            $this->connect();
            $stmt = self::$pdo->prepare("SELECT * FROM $tb $cm");
            if($params){
                $stmt->execute($params);
            }else{
                $stmt->execute();
            }
            return $stmt->fetchAll();
        } catch (Exception $e) {
             echo "ERROR FUNCTION : ".$e->getMessage();
        }
    }
    
    function last_ID($tb){
        try {
            $this->connect();
            $stmt = self::$pdo->prepare("SELECT id FROM $tb ORDER BY ID DESC LIMIT 1");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            
        }
    }
    
    function delete2($tb,$command,$params=null){
        try {
            $this->connect();
            $stmt = self::$pdo->prepare("DELETE FROM $tb $command");
            if($params){
                $stmt->execute($params);
            }else{
                $stmt->execute();
            }
            return 'true';
        } catch (Exception $e) {
             echo "ERROR FUNCTION : ".$e->getMessage();
        }
    }
    function DISTINCT($tb,$field){
        try{
            $this->connect();
            $stmt = self::$pdo->prepare("SELECT DISTINCT $field FROM $tb");
            $stmt->execute();
            return $stmt->rowCount();
            
        } catch (Exception $e) {
            echo 'ERROR FUNCTION : '.$e->getMessage();
        }
    }
    function NUMROW($tb,$cm){
        try{
            $this->connect();
            $stmt = self::$pdo->prepare("SELECT * FROM $tb $cm");
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $e) {
            echo 'ERROR FUNCTION : '.$e->getMessage();
        }
    }*/
    
}