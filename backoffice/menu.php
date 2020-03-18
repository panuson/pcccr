<?php
    $main_menu  = new Main();
    $news_menu = new News_Type();
    $pers_menu = new Personnel_Type();
    $dl_menu   = new Download_Type();
    

    $PATH   = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $PATH   = str_replace( $ws['BOF'], '', $PATH );
    $FOLDER = explode( '/', $PATH );
    $FOLDER = $FOLDER[0];
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if($_SESSION['ssid'] == 1) : ?>
                <!-- แดชบอร์ด -->
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>" class="nav-link <?php if ( $FOLDER == '' ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-tachometer-alt"></i>
                        <span>แดชบอร์ด</span>
                    </a>
                </li>
                <!-- ข้อมูลพื้นฐาน -->
                <li class="nav-header">ข้อมูลพื้นฐาน</li>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>main/list.php" class="text-truncate nav-link <?php if ( $FOLDER == 'main' && $id == '' ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-plus"></i>
                        <span>สร้างหมวดหมู่</span>
                    </a>
                </li>
                <?php foreach ($main_menu->OrderBy('topic','ASC')->all() as $key => $value): ?>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>main/?id=<?php echo $value['id']; ?>" class="text-truncate nav-link <?php if ( $FOLDER == 'main' && $id == $value['id'] ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-file"></i>
                        <span><?php echo $value['topic']; ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- ข่าว -->
                <!--<li class="nav-header">ข่าว</li>
                <?php if($_SESSION['ssid'] == 1) : ?>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>news/list.php" class="text-truncate nav-link <?php if ( $FOLDER == 'news' && $type == '' ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-plus"></i>
                        <span>สร้างหมวดหมู่</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php foreach ($news_menu->all() as $key => $value): ?>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>news/?type=<?php echo $value['id']; ?>" class="text-truncate nav-link <?php if ( $FOLDER == 'news' && $type == $value['id'] ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-file-alt"></i>
                        <span><?php echo $value['topic']; ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
                <?php if($_SESSION['ssid'] == 1) : ?>-->
                <!-- บุคลากร -->
                <!--<li class="nav-header">บุคลากร</li>-->
                <!--<li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>personnel/list.php" class="text-truncate nav-link <?php if ( $FOLDER == 'personnel' && $type == '' ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-users-cog"></i>
                        <span>จัดการบุคลากร</span>
                    </a>
                </li>-->

                <?php foreach ($pers_menu->all() as $key => $value): ?>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>personnel/?type=<?php echo $value['id']; ?>" class="text-truncate nav-link <?php if ( $FOLDER == 'personnel' && $type == $value['id'] ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-user"></i>
                        <span class="text-truncate"><?php echo $value['topic']; ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
                <!-- อัลบั้มภาพ -->
                <li class="nav-header">ข่าวสาร</li>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']?>gallery/?type=2" class="nav-link <?php if($FOLDER == 'gallery' && $type == 2 ): echo 'active'; endif;?>">
                        <i class="nav-icon fal fa-camera-retro"></i>
                        <span>ข่าวประชาสัมพันธ์</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']?>gallery/?type=1" class="nav-link <?php if($FOLDER == 'gallery' && $type == 1 ): echo 'active'; endif;?>">
                        <i class="nav-icon fal fa-camera-retro"></i>
                        <span>ภาพกิจกรรม</span>
                    </a>
                </li>
                <!-- ไฟล์ดาวน์โหลด -->
                <li class="nav-header">ไฟล์ดาวน์โหลด</li>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>download/category.php" class="nav-link">
                        <i class="nav-icon fal fa-plus"></i>
                        <span>สร้างหมวดหมู่</span>
                    </a>
                </li>
                <?php foreach ($dl_menu->orderBy('no','DESC')->all() as $key => $value): ?>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>download/?cid=<?php echo $value['id']; ?>" class="text-truncate nav-link <?php if ( $FOLDER == 'download' && $cid == $value['id'] ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-file-download"></i>
                        <span class="text-truncate"><?php echo $value['topic']; ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
                <!-- ตั้งค่า -->
                <li class="nav-header">ตั้งค่า</li>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>intro" class="nav-link <?php if ( $FOLDER == 'intro' ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-image"></i>
                        <span>ภาพ Intro</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>slide" class="nav-link <?php if ( $FOLDER == 'slide' ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-images"></i>
                        <span>ภาพสไลด์</span>
                    </a>
                </li>
                <!--<li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>users" class="nav-link <?php if ( $FOLDER == 'users' ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-users"></i>
                        <span>จัดการผู้ใช้งาน</span>
                    </a>
                </li>-->
                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>change_pwd" class="nav-link <?php if ( $FOLDER == 'change_pwd' ): echo 'active';endif;?>">
                        <i class="nav-icon fal fa-lock"></i>
                        <span>เปลี่ยนรหัสผ่าน</span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="nav-item w-100">
                    <a href="<?php echo $ws['BOF']; ?>logout.php" class="nav-link">
                        <i class="nav-icon fal fa-sign-out"></i>
                        <span>ออกจากระบบ</span>
                    </a>
                </li>
                <br>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>