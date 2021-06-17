<?php
require_once('../php/dbhelp.php');
if(!empty($_POST)){
    $f_ID = $f_name = $f_price = $f_ammount = $f_decription= '';
    if (isset($_POST['ID'])){
        $f_ID = $_POST['ID'];
    }
    
    if (isset($_POST['name'])){
        $f_name = $_POST['name'];
    }
    
    if (isset($_POST['price'])){
        $f_price = $_POST['price'];
    }
    
    if (isset($_POST['ammount'])){
        $f_ammount = $_POST['ammount'];
    }

    if (isset($_POST['decription'])){
        $f_decription = $_POST['decription'];
    }
    
    //Xử lý ảnh
    //Bước 1: Tạo thư mục lưu file
    $target_dir = "C:/xampp/htdocs/images/";
    $target_file = $target_dir . basename($_FILES['picture']['name']);
    // Kiểm tra kiểu file hợp lệ
    
    //Kiểm tra kích thước file
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
    //Kiểm tra và chuyển filr từ bộ nhớ tạm lên sever
    if (empty($error)) {
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
            echo "Bạn đã upload file thành công";
        } else {
            echo "File bạn vừa upload gặp sự cố";
        }
    }
    $sql = "insert into menu(ID, Name, Price, Ammount, Note, Picture, Decription ) value ('$f_ID','$f_name','$f_price','$f_ammount','','$target_file','$f_decription')";
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
    <title>Add New Food</title>
    <link rel="stylesheet" href="addnewfood.css">
</head>

<body>
    <?php
        $sql = 'select * from menu';
        $menuList = executeResult($sql);
        foreach($menuList as $std){
        }
    ?>
    <!-- Body header -->
    <header id="body-header">
        <a href="../SE_project/mainPage.html">
            <img class="logo" src="../images/Nova.jpg" alt="Logo">
        </a>
    </header>
    <div class="clearfix"></div>
    <!-- Sản phẩm -->
    <section class="product-infor">
        <article class="product">
            <div class="product-content">
                <form enctype="multipart/form-data" method="post">
                    <label class="product-label" for="ID">Số thứ tự:</label>
                    <input type="number" class="food-ID" id="ID" name="ID" size="7" required>
                    <label class="product-label" for="name">Tên món ăn:</label>
                    <input type="text" class="food-name" id="name" name="name" required>
                    <br>
                    <label class="product-label" for="price">Giá:</label>
                    <input type="text" class="food-price" id="price" name="price" size="14" required>
                    <label class="product-label" for="ammount">Số lượng hiện có:</label>
                    <input type="text" class="food-ammount" id="ammount" name="ammount" size="10" required>
                    <br>
                    <label class="product-label" for="picture">Hình ảnh món ăn:</label>
                    <input type="file" class="food-picture" id="picture" name="picture" multiple required>
                    <br>
                    <label class="product-label" for="decription">Mô tả món ăn:</label>
                    <br>
                    <textarea class="food-decription" id="decription" name="decription" cols="80" rows="15"></textarea>
                    <br>
                    <input class="save-btn" type="submit" name="complete" value="Hoàn thành">
                </form>
            </div>
        </article>
    </section>
    <!-- Footer -->
    <footer class="footer"></footer>
    <!-- File JavaScript -->
    <script src="addnewfood.js"></script>
</body>

</html>