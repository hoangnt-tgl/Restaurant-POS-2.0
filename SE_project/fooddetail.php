<?php
require_once('./php/dbhelp.php');
// Lấy dữ liệu
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
        $link = $std['Picture'];
        $decription = $std['Decription'];
    }
    else {
        $food_ID = '';
    }

}
// Thêm dữ liệu vào database
if (isset($_POST["note-save"])) {
    $f_ID = $ID;
    $f_name = $name;
    $f_link = $link;
    if (isset($_POST['note'])) {
        $f_note = $_POST['note'];
    }
    $sql = "insert into mon(ID, TEN, GIA, SO_LUONG, TONG_TIEN, LINK, GHI_CHU ) value ('$f_ID','$f_name','','','','$f_link','$f_note')";
    execute($sql);
}
if (isset($_POST["confirm-order"])) {
    $f_ID = $f_name = $f_price = $f_number = $f_money = $f_link = $f_note =  '';

    $f_ID = $ID;
    $f_name = $name;
    $f_price = $price;
    $f_link = $link;
    if (isset($_POST['number'])) {
        $f_number = $_POST['number'];
    }
    if ($ID != '') {
        $sql = 'select * from mon where ID = ' .$ID;
        $menuList = executeResult($sql);
        if ($menuList != NULL) {
            $std = $menuList[0];
            $f_note = $std['GHI_CHU'];
        }
    }
    (INT)$f_money = (INT)$f_number * (INT)$f_price;
    $sql = "update mon set TEN = '$f_name', GIA = '$f_price', SO_LUONG = '$f_number', TONG_TIEN = '$f_money', LINK = '$f_link', GHI_CHU = '$f_note' where ID = " .$ID;
    execute($sql);
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
                    <textarea class="note-box" type="text" id="note" name="note" placeholder="Ghi chú" cols="20" rows="2"></textarea>
                    <br>
                    <input type="submit" class="note-save-btn" name="note-save" value="Lưu lại">
                    <input type="reset" class="reset-note-btn" name="reset-note" value="Đặt lại">
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
            <div class="confirm-order-form">
                <form enctype="multipart/form-data" method="post">
                    <a id="minus" onclick="decreasenumber()"><i class="fas fa-minus"></i></a>
                    <input id="number" name="number" value="1" size="2">
                    <a id="plus" onclick="increasenumber()"><i class="fas fa-plus"></i></a>
                    <br>
                    <input type="number" class="food-ID" name="ID" id="food-ID" value="<?=$ID?>">
                    <input type="submit" class="confirm-btn" name="confirm-order" value="Xác nhận">
                    <button class="cancle-btn" onclick="closeConfirmOrderModal()">Hủy</button>
                </form>
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
    <script src="./js/fooddetail.js"></script>
</body>

</html>