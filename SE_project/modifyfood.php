<?php
require_once('dbhelp.php');
// Cập nhật dữ liệu vào database
if(!empty($_POST)){
    $f_ID = $f_name = $f_price = $f_ammount = $f_decription= '';
    $error = array();

    if (isset($_POST['ID'])) {
        $f_ID = $_POST['ID'];
    }
    
    if (isset($_POST['name'])) {
        $f_name = $_POST['name'];
    }
    
    if (isset($_POST['price'])) {
        $f_price = $_POST['price'];
    }
    
    if (isset($_POST['ammount'])) {
        $f_ammount = $_POST['ammount'];
    }

    if (isset($_POST['decription'])) {
        $f_decription = $_POST['decription'];
    }

    // Sửa Nhập vào
    $f_name = str_replace('\'','\\\'',$f_name);
    $f_decription = str_replace('\'','\\\'',$f_decription);
    
    // Xử lý ảnh
    // Bước 1: Tạo thư mục lưu file
    $target_dir = "C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/";
    $target_file = $target_dir . basename($_FILES['picture']['name']);
    // Kiểm tra kiểu file hợp lệ
    
    // Kiểm tra kích thước file
    $size_file = $_FILES['picture']['size'];
    if ($size_file > 5242880) {
        $error['picture'] = "File bạn chọn không được quá 5MB";
    }

    //Kiểm tra loại file
    $file_type = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    $file_type_allow = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array(strtolower($file_type), $file_type_allow)){
        $error['picture'] = "Kiểu file không phải là ảnh";
    }

    // Kiểm tra file đã tồn tại trê hệ thống
    if (file_exists($target_file)) {
        $error['picture'] = "File bạn chọn đã tồn tại trên hệ thống";
    }
    // Kiểm tra và chuyển file từ bộ nhớ tạm lên sever
    if ($f_ID != '') {
        if (strlen($target_file) > 53) {
            move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
        }
        else {
            $sql = 'select * from menu where ID=' .$f_ID;
            $menuList = executeResult($sql);
            if ($menuList != NULL) {
                $std = $menuList[0];
                $target_file = $std['Picture'];
            }
        }
        $sql = "update menu set Name = '$f_name', Price = '$f_price', Ammount = '$f_ammount', Note = '', Picture = '$target_file', Decription = '$f_decription' where ID = " .$f_ID;
        execute($sql);
        header('Location: managermenu.php');
        die();
    }
}

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
    <title>Modify Food</title>
    <link rel="stylesheet" href="./css/modifyfood.css">
</head>

<body>
    <!-- Body header -->
    <header id="body-header">
        <a href="../SE_project/mainPage.php">
            <img class="logo" src="./images/Nova.jpg" alt="Logo">
        </a>
    </header>
    <div class="clearfix"></div>
    <!-- Sản phẩm -->
    <section class="product-infor">
        <article class="product">
            <div class="product-content">
                <form enctype="multipart/form-data" method="post">
                    <input type="number" class="food-ID" id="ID" name="ID" value="<?=$ID?>">
                    <label class="product-label" for="name">Tên món ăn:</label>
                    <input type="text" class="food-name" id="name" name="name" value="<?=$name?>">
                    <br>
                    <label class="product-label" for="price">Giá:</label>
                    <input type="text" class="food-price" id="price" name="price" value="<?=$price?>đ/phần">
                    <label class="product-label" for="ammount">Số lượng hiện có:</label>
                    <input type="text" class="food-ammount" id="ammount" name="ammount" value="<?=$ammount?> phần">
                    <br>
                    <label class="product-label" for="picture">Hình ảnh món ăn:</label>
                    <br>
                    <img class="food-picture" src="<?=$picture?>" alt="Photo">
                    <br>
                    <input type="file" class="food-picture-file" id="picture" name="picture">
                    <br>
                    <label class="product-label" for="decription">Mô tả món ăn:</label>
                    <br>
                    <textarea class="food-decription" id="decription" name="decription" cols="84" rows="15"><?=$decription?></textarea>
                    <br>
                    <input class="save-btn" type="submit" name="complete" value="Hoàn thành">
                    <input type="reset" class="reset-btn" name="reset" value="Đặt lại">
                </form>
            </div>
        </article>
    </section>
    <!-- Footer -->
    <footer class="footer"></footer>
    <!-- File JavaScript -->
    <script src="modifyfood.js"></script>
</body>

</html>