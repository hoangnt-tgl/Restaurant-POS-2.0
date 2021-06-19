<?php
require_once('./php/dbhelp.php');
// Xóa
if(isset($_POST["confirm-delete"])){
    $f_ID = '';
    if (isset($_POST['ID'])) {
        $f_ID = $_POST['ID'];
    }
    if ($f_ID != '') {
        $sql = "delete from menu where ID = " .$f_ID;
    }
    execute($sql);
    header("location: managermenu.php");
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
    <title>Manager Menu</title>
    <link rel="stylesheet" href="./vendors/grid.css">
    <link rel="stylesheet" href="./css/managermenu.css">
</head>

<body>
    <!-- Body header -->
    <header id="body-header">
        <a href="../SE_project/mainPage.html">
            <img class="logo" src="./images/Nova.jpg" alt="Logo">
        </a>
        <form class="search-container" method="get">
            <input type="search" class="search-box" name="search-holder" placeholder="Tìm kiếm" size="50">
            <button type="submit" class="search-icon" name="search-click">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </header>
    <div class="clearfix"></div>
    <!-- Danh mục sản phẩm -->
    <section class="manager-menu">
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
            $ID = $std['ID'];
            echo
            '<article class="product">
            <a href="#">
                <img class="select" src="'.'.'.mb_substr($std['Picture'],45).'" alt="Photo">
                <a class="modify-food" onclick=\'window.open("modifyfood.php?id='.$std['ID'].'","_self")\'>
                    <h3 class="icon-name">Chỉnh sửa</h3>
                </a>
                <a class="delete-food" onclick="openConfirmDeleteModal()">
                    <h3 class="icon-name">Xóa</h3>
                </a>
            </a>
            <h5 class="food-name">'.$std['Name'].'</h5>
            </article>
            ';
        }
    ?>
        <!-- Xác nhận xóa -->
        <div class="confirm-delete-modal">
            <div id="confirm-delete-container">
                <h2 class="confirm-delete-content">
                    Bạn có chắc chắn muốn xóa món ăn này?
                </h2>
                <div class="confirm-delete-btn-container">
                    <form enctype="multipart/form-data" method="post">
                        <input type="number" class="food-ID" name="ID" value="<?=$ID?>">
                        <input type="submit" class="confirm-delete-btn" name="confirm-delete" value="Xác nhận">
                        <button class="cancle-delete-btn" onclick="closeConfirmDeleteModal()">Hủy</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Thêm món ăn mới -->
        <div class="add-new-product">
                <a class="add-new-food" href="addnewfood.php">
                    <i class="far fa-plus-square" id="anf-icon"></i>
                    <h3 class="anf-icon-name">Thêm món ăn</h3>
                </a>
            </div>
        <div class="clearfix"></div>
    </section>
    <footer class="footer"></footer>
    <!-- File JavaScript -->
    <script src="./js/managermenu.js"></script>
</body>

</html>