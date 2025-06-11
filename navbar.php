<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar fade-down" data-aos="fade-down" data-aos-duration="800">
    <div class="content">
        <div class="logo">
            <div class="logo-icon">
                <img class="img-icon" src="img/icon-logo.png" alt="">
            </div>
            <div class="logo-title">
                <a class="title-icon" href="">SAMARA</a>
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
                <a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-user"></i> About
                </a>
            </li>
            <li>
                <a href="blog.php" class="<?php echo ($current_page == 'blog.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-blog"></i> Blog
                </a>
            </li>
            <li>
                <a href="contact.php" class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-envelope"></i> Contact
                </a>
            </li>
        </ul>
        <div class="icon menu-btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</nav>
