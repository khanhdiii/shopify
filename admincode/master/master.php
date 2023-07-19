<?php 
   // $_SESSION['username'] = "Admin";
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="../assets/css/admin_stylesheet.css" rel="stylesheet" type="text/css" />
    <!-- Table -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">
    </script>


</head>

<body>
    <?php include'connect.php'?>
    <div id="header">
        <div class="btnhide">
            <span class="fas fa-bars"></span>
        </div>
        <div class="header-logo">
            <a href="admin_page.html">
                <img src="../assets/img/logoo.png" alt="" />
            </a>
        </div>



        <div class="header-nav nav-right">
            <ul>
                <li><a href="#"><i class="fas fa-address-book header-icon"></i>Liên hệ</a></li>
                <li><a href="#"><i class="fas fa-shopping-bag header-icon"></i>Đơn hàng</a></li>
                <li><a href=""><i class="fas fa-bell header-icon"></i>
                        <span class="notification-bell">4</span>
                    </a></li>
                <li><a href=""><i class="fas fa-user-circle header-icon"></i>adNTB</a></li>
            </ul>
        </div>

    </div>


    <div id="main">
        <nav class="sidebar">
            <div class="admin-inf">
                <img src="../assets/img/user1.png" alt="" />
                <div class="admin-sub-inf">
                    <h4>Duy Khánh</h4>
                    <h5>Administrator</h5>
                </div>
            </div>

            <ul>
                <li class="active"><a href="overview.php">Tổng quan</a></li>
                <li>
                    <a href="#" class="feat-btn">Quản lý
                        <span class="fas fa-caret-down first"></span>
                    </a>
                    <ul class="feat-show">
                        <li><a href="category.php">+ Danh mục</a></li>
                        <li><a href="products.php">+ Sản phẩm</a></li>
                        <li><a href="supplier.php">+ Nhà cung cấp</a></li>
                        <li><a href="#">+ Thành viên</a></li>
                        <li><a href="banner.php">+ Banner</a></li>
                        <li><a href="#">+ Khuyến mãi</a></li>
                    </ul>
                </li>
                <li class="active"><a href="overview.php">Thống kê</a></li>
            </ul>
        </nav>
        <div class="banner">
            <?php
                include 'connect.php';
               
                    $sql = "SELECT BannerImages FROM banner WHERE Id_Banner = 5";
                    $banner = mysqli_query($connect, $sql);
                    $ban = mysqli_fetch_assoc($banner);   
            ?>
            <img src="banners/<?php echo $ban['BannerImages']?>" width="1370px" height="350px">
        </div>
        <div class="main-content">