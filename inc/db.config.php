<?php
require_once 'function.php';
class Admin extends Commands
{
    protected $tb_name = 'tb_admin';
}
class Counter extends Commands
{
    protected $tb_name = 'tb_counter';
}
class Course extends Commands
{
    protected $tb_name = 'tb_course';
}
class Choice extends Commands
{
    protected $tb_name = 'tb_choice';
}
class Choice_Topic extends Commands
{
    protected $tb_name = 'tb_choice_topic';
}
class UserOnline extends Commands
{
    protected $tb_name = 'tb_useronline';
}
class Main extends Commands
{ //ข้อมูลทั่วไป
    protected $tb_name = 'tb_main';
}
class News extends Commands
{ //ข่าว
    protected $tb_name = 'tb_news';
}
class News_Type extends Commands
{ //หมวดหมู่ข่าว
    protected $tb_name = 'tb_news_type';
}
class Personnel extends Commands
{
    protected $tb_name = 'tb_personnel';
}
class Personnel_Type extends Commands
{ //หมวดหมู่บุคลากร
    protected $tb_name = 'tb_personnel_type';
}
class Gallery extends Commands
{ //แกลอรี่
    protected $tb_name = 'tb_gallery';
}
class Gallery_Images extends Commands
{ //อัพโหลดภาพ แกลอรี่
    protected $tb_name = 'tb_gallery_images';
}
class Gallery_Type extends Commands
{ //หมวดหมู่แกลอรี่
    protected $tb_name = 'tb_gallery_type';
}
class Slider extends Commands
{ //ภาพสไลด์
    protected $tb_name = 'tb_slider';
}
class Intro extends Commands
{ //ภาพintroหน้าเว็บ
    protected $tb_name = 'tb_intro';
}
class Download extends Commands
{ //หัวข้อหลักไฟล์ดาวน์โหลด
    protected $tb_name = 'tb_download';
}
class Download_Type extends Commands
{ //หมวดหมู่ไฟล์ดาวน์โหลด
    protected $tb_name = 'tb_download_type';
}
class Download_File extends Commands
{ //ไฟล์ดาวน์โหลด
    protected $tb_name = 'tb_download_file';
}
class Download_File_Sub extends Commands
{ //ไฟล์ดาวน์โหลด
    protected $tb_name = 'tb_download_file_sub';
}
class Youtube extends Commands
{
    protected $tb_name = 'tb_youtube';
}
class Register extends Commands
{
    protected $tb_name = 'tb_register';
}

