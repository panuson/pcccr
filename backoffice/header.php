<style>body{min-height: 100vh !important;}.wrapper{min-height: 100vh !important;}</style>
<?php Auth::CheckSession();?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Right navbar links -->
    <div class="navbar-nav mr-auto">
        <a class="navbar-brand px-2" href="#">ระบบจัดการเว็บไซต์</a>
    </div>
    <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a href="<?php echo $ws['BOF']; ?>logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
    </ul>
</nav>