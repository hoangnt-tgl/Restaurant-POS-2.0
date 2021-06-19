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
        <form class="search-container">
            <input class="search-box" type="search" placeholder="Tìm kiếm" size="50">
            <button class="search-icon">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <form class="filter-top-container">
            <select class="filter-product-top">
                <option>Bữa sáng</option>
                <option>Bữa trưa</option>
                <option>Bữa tối</option>
            </select>
            <select class="filter-product-top">
                <option>Dưới 100.000đ</option>
                <option>Trên 100.000đ đến 300.000đ</option>
                <option>Trên 300.000đ đến 500.000đ</option>
                <option>Trên 500.000đ</option>
            </select>
        </form>
        <br>
        <form class="filter-bottom-container">
            <select class="filter-product-bottom">
                <option>Trà Đào</option>
                <option>Trà Vải</option>
                <option>Coca-cola</option>
                <option>Pepsi</option>
                <option>Heniken</option>
            </select>
            <select class="filter-product-bottom">
                <option>Bánh táo nướng</option>
                <option>Bánh Mochi Nhật Bản</option>
                <option>Bánh Tiramisu Ý</option>
                <option>Bánh Tapioca Brazil</option>
                <option>Bánh Macaron Pháp</option>
                <option>Bánh Gateau St. Honore</option>
                <option>Bánh trifle Anh quốc</option>
            </select>
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
        $sql = 'select * from menu';
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
                <a class="btn1" onClick="openConfirmOrderModal()">Thêm vào giỏ hàng</a>
                <a class="btn2" onclick=\'window.open("fooddetail.php?id='.$std['ID'].'","_self")\'>Xem chi tiết</a>
            </footer>
        </article>';
        }
    ?>
         <div class="clearfix"></div>
        <!-- Chuyển trang -->
        <div class="page-move">
            <a href="#" class="move">
                <i class="fas fa-angle-right"></i>
            </a>
            <a href="#" class="move">
                    ...
                </a>
            <a href="#" class="move">
                    3
                </a>
            <a href="#" class="move">
                    2
                </a>
            <a href="#" class="move">
                    1
                </a>
            <a href="#" class="move">
                <i class="fas fa-angle-left"></i>
            </a>
        </div>
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
    <script src="./js/clientmenu.js"></script>
</body>

</html>