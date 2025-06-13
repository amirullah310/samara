<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar fade-down" data-aos="fade-down" data-aos-duration="800">
    <div class="content">
        <div class="logo">
            <div class="logo-icon">
                <img class="img-icon" src="img/icon-logo.png" alt="Logo">
            </div>
            <div class="logo-title">
                <a class="title-icon" href="index.php">SAMARA</a>
            </div>
        </div>
        <ul class="menu-list">
            <div class="icon cancel-btn">
                <i class="fa-solid fa-times"></i>
            </div>
            <li>
                <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-house"></i> Home
                </a>
            </li>
            <li>
                <a href="blog.php" class="<?php echo ($current_page == 'blog.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-blog"></i> Data Blog
                </a>
            </li>
            <li>
                <a href="tipeartikel.php" class="<?php echo ($current_page == 'tipeartikel.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-tags"></i> Tipe Artikel
                </a>
            </li>
            <li>
                <a href="event.php" class="<?php echo ($current_page == 'event.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-calendar-days"></i> Data Event
                </a>
            </li>
            <li>
                <a href="setting.php" class="<?php echo ($current_page == 'setting.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-gear"></i> Setting
                </a>
            </li>
        </ul>
        <div class="icon menu-btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</nav>
