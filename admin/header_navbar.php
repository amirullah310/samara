
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <style>
        <?php include 'css/header.css' ?>
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container">
    <div class="profile">
        <div class="op">
           <h2><a href="../pagehome/index.php">DASHBOARD SAMARA</a></h2>
        </div>
        <div class="oi">
            <div class="dropbtnn"><img class="img" src="https://cdn.iconscout.com/icon/free/png-128/person-1780867-1514182.png"  alt=""></div>
            <div class="dropdownn-contentt">
            <a href="../database/logout.php">Log Out</a>
            </div>
        </div>
    </div>
    <!-- sidebar -->
    <div class="sidebar">
        <div class="navbar">
        <ul id="menu_dropdown">
   <li class="menu_utama"><a href="index.php">Home</a></li>
   <li class="menu_utama"><a href="listblog.php">All Blog</a>
   <ul class="menu_sub">
     <li><a href="listblog.php">List Blog</a></li>
     <li><a href="addpost.php">Add Blog</a></li>
   </ul>
   </li>
   <li class="menu_utama"><a href="listevent.php">All Event</a>
   <ul class="menu_sub">
     <li><a href="listevent.php">List Event</a></li>
     <li><a href="addpost.php">Add Event</a></li>
   </ul>
   </li>
   <li class="menu_utama"><a href="setting.php">Setting</a></li>
  

</ul>
        </div>
    </div>
</body>
</html>
