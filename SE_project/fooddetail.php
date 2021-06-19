<?php
require_once('./php/dbhelp.php');
$food_ID = '';
if (isset($_GET['id'])) {
    $food_ID = $_GET['id'];
    $sql = 'select * from menu where ID = ' .$food_ID;
    $menuList = executeResult($sql);
    if ($menuList != NULL) {
        $std = $menuList[0];
        $ID = $std['ID'];
        $name = $std['Name'];
        $price = $std['Price'];
        $ammount = $std['Ammount'];
        $picture = '.'.mb_substr($std['Picture'], 45);
        $decription = $std['Decription'];
    }
    else {
        $food_ID = '';
    }

}
?>

<!DOCTYPE html>

<html>
<!-- Page header -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <title>Food Detail</title>
    <link rel="stylesheet" href="./css/fooddetail.css">
</head>

<body>
    <!-- Body header -->
    <header id="body-header">
        <a href="../SE_project/mainPage.html">
            <img class="logo" src="../images/Nova.jpg" alt="Logo">
        </a>
        <a class="detail-cart-plus" onclick="openConfirmOrderModal()">
            <i class="fas fa-cart-plus"></i>
            <h3 class="icon-name">Thêm vào giỏ hàng</h3>
        </a>
        <a class="detail-cart" href="cart.php">
            <i class="fas fa-shopping-cart"></i>
            <h3 class="icon-name">Giỏ hàng</h3>
        </a>
        <a class="menu-back" href="clientmenu.php">
            <i class="fas fa-th"></i>
            <h3 class="icon-name">Menu</h3>
        </a>
    </header>
    <div class="clearfix"></div>
    <!-- Sản phẩm -->
    <section class="product-infor">
        <article class="product">
            <div class="product-prn">
                <img class="food-picture" src="<?=$picture?>" alt="Chicken">
                <div class="clearfix"></div>
                <div class="food-review">
                    <span class="food-review-content">Đánh giá: </span>
                    <span class="food-review-level">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </span>
                </div>
                <form class="note-container" enctype="multipart/form-data" method="post">
                    <textarea class="note-box" type="text" placeholder="Ghi chú" cols="20" rows="2"> </textarea>
                </form>
            </div>
            <div class="clearfix"></div>
            <div class="product-content">
                <h2 class="food-np">
                    <span class="food-name">Tên món ăn: <?=$name?></span>
                    <span class="food-price">Giá: <?=$price?>đ/phần</span>
                </h2>
                <h2 class="food-ammount">Số lượng hiện có: <?=$ammount?> phần</h2>
                <textarea class="food-decription" cols="84" rows="15"><?=$decription?></textarea>
            </div>
            <div class="clearfix"></div>
        </article>
    </section>
    <div class="confirm-order-modal">
        <div id="confirm-order-container">
            <h2 class="confirm-order-content">
                Hãy chọn số lượng cho món ăn này
            </h2>
            <div class="confirm-order-number">
                <button id="minus" onclick="decreasenumber()"><i class="fas fa-minus"></i></button>
                <span id="number">1</span>
                <button id="plus" onclick="increasenumber()"><i class="fas fa-plus"></i></button>
            </div>
            <div class="confirm-order-btn">
                <a class="confirm-btn" onclick="closeConfirmOrderModal()">Xác nhận</a>
                <a class="cancle-btn" onclick="closeConfirmOrderModal()">Hủy</a>
            </div>
        </div>
    </div>
    <footer class="contact">
        <article class="contact-info">
            <h4 class="contact-text"><i class="fas fa-location-arrow"> Address: </i> Đại học bách khoa TPHCM, Thủ Đức, TPHCM</h4>
            <h4 class="contact-text"><i class="fas fa-envelope"> Email: </i> hau.pham1304@hcmut.edu.vn</h4>
            <h4 class="contact-text"><i class="fas fa-phone"> Telephone: </i> 0943765795</h4>
        </article>
    </footer>
    <!-- File JavaScript -->
    <script src="fooddetail.js"></script>
</body>

</html>