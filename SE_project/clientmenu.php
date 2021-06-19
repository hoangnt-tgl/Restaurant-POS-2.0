<?php
require_once('./php/dbhelp.php');
// Thêm dữ liệu vào database
if (isset($_POST["confirm-order"])){
    $f_ID = $f_name = $f_price = $f_number = $f_money = $f_link = '';
    
    if (isset($_POST['ID'])) {
        $f_ID = $_POST['ID'];
        $sql = "select * from menu where ID = " .$f_ID;
        $menuList = executeResult($sql);
        if ($menuList != NULL) {
            $std = $menuList[0];
            $f_name = $std['Name'];
            $f_price = $std['Price'];
            $f_link = $std['Picture'];
        }
    }
    if (isset($_POST['number'])) {
        $f_number = $_POST['number'];
    }
    (INT)$f_money = (INT)$f_number * (INT)$f_price;
    $sql = "insert into mon(ID, TEN, GIA, SO_LUONG, TONG_TIEN, LINK, GHI_CHU ) value ('$f_ID','$f_name','$f_price','$f_number','$f_money','$f_link','')";
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
    <title>Client Menu</title>
    <link rel="stylesheet" href="./css/clientmenu.css">
</head>

<body>
    <!-- Body header -->
    <header id="body-header">
        <a href="../SE_project/mainPage.html">
            <img class="logo" src="./images/logo.png" alt="Logo">
        </a>
        <form class="search-container" method="get">
            <input type="search" class="search-box" name="search-holder" placeholder="Tìm kiếm" size="50">
            <button type="submit" class="search-icon" name="search-click">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <a class="menu-cart" href="cart.php">
            <i class="fas fa-shopping-cart"></i>
            <h3 class="cart-name">Giỏ hàng</h3>
        </a>
    </header>
    <div class="clearfix"></div>
    <!-- Danh mục sản phẩm -->
    <section class="client-menu">
    <?php
        require_once('./php/dbhelp.php');
        //Tìm kiếm
        if(isset($_GET["search-click"])){
            $s_text = '';
            if (isset($_GET["search-holder"])) {
                $s_text = $_GET["search-holder"];
            }
            if ($s_text != '') {
                $sql = 'select * from menu where Name like "%'.$s_text.'%"';
            }
        }
        else {
            $sql = 'select * from menu';
        }
        $menuList = executeResult($sql);
        foreach($menuList as $std){
            echo
            '<article class="product">
                <header class="product-header">
                    <a href="#">
                        <img class="select" src="'.'.'.mb_substr($std['Picture'], 45).'" alt="Photo">
                    </a>
                </header>
                <div class="content">
                    <h2 class="name" id="name">'.$std['Name'].'</h2>
                    <h2 class="price" id="price">'.$std['Price'].'đ/phần</h2>
                    <h5 class="decription" id="decription">'.mb_substr($std['Decription'],0, 100).'<br>'.mb_substr($std['Decription'],101, 100).'<br>'.mb_substr($std['Decription'],201, 100).'...'.'</h5>
                </div>
                <footer class="content">
                    <a class="btn1" onClick="openConfirmOrderModal('.$std['ID'].')">Thêm vào giỏ hàng</a>
                    <a class="btn2" onclick=\'window.open("fooddetail.php?id='.$std['ID'].'","_self")\'>Xem chi tiết</a>
                </footer>
            </article>
            ';
        }
    ?>
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
                    <input type="number" class="food-ID" name="ID" id="food-ID" value="">
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
    <script src="./js/clientmenu.js"></script>
</body>

</html>