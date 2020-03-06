<?php
ob_start();
session_start();
header( "Cache-Control: no-store, no-cache, must-revalidate, max-age=0" );
header( "Cache-Control: post-check=0, pre-check=0", false );
header( "Pragma: no-cache" );
class Config
{

    private static $user = "root";
    private static $pass = "";
    private static $dsn  = "mysql:host=localhost;dbname=pcccr"; //
    public static $pdo;

    public static function connect()
    {
        self::$pdo = new PDO( self::$dsn, self::$user, self::$pass );
        self::$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
        self::$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        self::$pdo->exec( "set names utf8" );
        return self::$pdo;
    }
    public static function URL()
    {
       return 'http://localhost/';
    }
    public static function BOF()
    {
        return self::URL() . 'pcccr/backoffice/';
    }
    public static function SITENAME()
    {
        return '';
    }
}
class Auth
{
    public function CheckSession()
    {
        $sess_usrid   = ( !empty( $_SESSION['sess_usrid'] ) ? $_SESSION['sess_usrid'] : '' );
        $sess_usrname = ( !empty( $_SESSION['sess_usrname'] ) ? $_SESSION['sess_usrname'] : '' );
        $sess_pwd     = ( !empty( $_SESSION['sess_password'] ) ? $_SESSION['sess_password'] : '' );
        $ssid         = ( !empty( $_SESSION['ssid'] ) ? $_SESSION['ssid'] : '' );
        if ( $sess_usrid != session_id() || !empty( $sess_usrname ) || !empty( $ssid ) )
        {
            $admin = new Admin();
            if ( !$admin->where( "WHERE pwd='{$sess_pwd}'" )->find() )
            {
                header( 'location: ' . $admin->BOF() . 'login.php' );
                //echo "<script>location.replace('".$admin->BOF()."login.php')</script>";
            }
        }
    }
    public function Logout()
    {
        session_destroy();
        header( "location: ./login.php" );
    }
}
$config = new Config();
require_once 'db.config.php';
function url($path){
    echo Config::URL().$path;
}
function asset($path, $echo = true) {
    if($echo){
        echo Config::URL()."assets/".$path;
    }else{
        return Config::URL()."assets/".$path;
    }
}
$ws['BOF']      = $config->BOF();
$ws['SITENAME'] = $config->SITENAME();
$type;