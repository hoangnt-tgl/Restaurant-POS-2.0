<?php
require_once('dbhelp.php');

if(!empty($_POST['info'])){
    $_username = $_name = $_gender = $_id_card = $_phone = $_email = $_address = '';
    if (isset($_POST['username'])){
        $_username = $_POST['username'];
    }
    if (isset($_POST['name'])){
        $_name = $_POST['name'];
    }
    if (isset($_POST['gender'])){
        $_gender = $_POST['gender'];
    }
    if (isset($_POST['id_card'])){
        $_id_card = $_POST['id_card'];
    }
    if (isset($_POST['phone'])){
        $_phone = $_POST['phone'];
    }
    if (isset($_POST['email'])){
        $_email = $_POST['email'];
    }
    if (isset($_POST['address'])){
        $_address = $_POST['address'];
    }
    if ($_username != ''){
        $sql="update account set name = '$_name', gender = '$_gender', `identity card` = '$_id_card', `phone number` = '$_phone', email = '$_email', address = '$_address' where username = '$_username'";
    }
    execute($sql);
}
if(!empty($_POST['login'])){
    $_username = $_password = $_position = '';
    if (isset($_POST['username'])){
        $_username = $_POST['username'];
    }
    if (isset($_POST['password'])){
        $_password = $_POST['password'];
    }
    if (isset($_POST['position'])){
        $_position = $_POST['position'];
    }
    if ($_username != ''){
        $sql="update account set password = '$_password', position = '$_position' where username = '$_username'";
    }
    execute($sql);
}
if(!empty($_POST['delete'])){
    $_username = '';
    if (isset($_POST['username'])){
        $_username = $_POST['username'];
    }
    if ($_username != ''){
        $sql="delete from account where username = '$_username'";
    }
    execute($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Tea Station || Account Manager</title>
    <!-- font-awesome -->
    
    <!-- custom css -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/account_manager.css"/>

</head>

<body>


    <!-- header -->
    <header>
        <div><img class="logo" src="images/logo.png" alt="Logo"></div>
        <div class="name">nova restaurant</div>
    </header>
    <div class="btn-group" role="group" style="width:100%">
        <button type="button" class="btn btn-secondary">Quản lý tài khoản</button>
        <button type="button" class="btn btn-secondary" onclick="window.open('restaurantManagement.html')"s>Nhà hàng</button>
        <button type="button" class="btn btn-secondary">Thông tin tài khoản</button>
    </div>

    <div class="btn-group" role="group" style="width:100%">
        <button class="tablink btn btn-info" onclick="filterSelection('all')" id="defaultOpen">Tất cả</button>
        <button class="tablink btn btn-info" onclick="filterSelection('staff')">Nhân viên</button>
        <button class="tablink btn btn-info" onclick="filterSelection('manage')">Quản lý</button>
        <button class="tablink btn btn-info" onclick="window.open('add_account.php','_self')">Thêm nhân viên</button>
        <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
    </div>  

    <div class="account" >
        <div class="container" id="myMenu">
            <?php
            $sql = 'select * from account';
            $accountList = executeResult($sql);
            foreach($accountList as $std){
                echo '
                <form method="post" onsubmit="return confirm(\'Bạn muón xóa tài khoản này\');">
                <div class="filterDiv '.$std['position'].'"> 
                    <input name="username" style="display:none" value="'.$std['username'].'">
                    <li><a onclick="openCity(event, \''.$std['username'].'\')">'.$std['name'].'</a>
                    <input type="submit" name="delete" value="Xóa">
                    </li>
                </div>
                </form>
                ';
            }
            ?>    
        </div>

        <div class="info ">
            <?php
            $sql = 'select * from account';
            $accountList = executeResult($sql);
            foreach($accountList as $std){
                $male = "";
                $female = "";
                $manage = "";
                $staff = "";
                if ($std['position'] == "manage"){
                    $manage = "checked";
                }
                else {
                    $staff = "checked";
                }
                if ($std['gender'] == "male"){
                    $male = "checked";
                }
                else {
                    $female = "checked";
                }
                echo '
            <div id='.$std['username'].' class="tabcontent">
                <h2>Thông tin cá nhân</h2>
                <div class="row">
                    <div class="col-4 text-center">
                        <img src="images/logo.png" alt="Avatar" style="width:150px;">
                    </div>
                    <div class="col-7" style="background-color:#ddd;">
                        <form method="post" onsubmit="return confirm(\'Do you\');">
                            <input name="username" style="display:none" value="'.$std['username'].'">
                            <label>Họ và tên:</label><br>
                            <input type="text" class="form-control" name="name" value="'.$std['name'].'">
                            Giới tính: <br>
                            <input type="radio"  name="gender" value="male" '.$male.'>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" '.$female.'>
                            <label for="female">Female</label><br>

                            <label>CMND:</label><br>
                            <input type="text" class="form-control" name="id_card" value="'.$std['identity card'].'">

                            <label>Số điện thoại:</label><br>
                            <input type="tel" class="form-control" name="phone" placeholder="10 số" pattern="[0]{1}[0-9]{9}" value="'.$std['phone number'].'">

                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" value="'.$std['email'].'">
                            <label>Địa chỉ:</label>
                            <input type="text" class="form-control" name="address" value="'.$std['address'].'"><br>
                            <input type="submit" name="info" class="btn-success" value="Submit">
                            <input type="reset" class="btn-default" value="Reset">
                        </form>
                    </div>
                </div>
                <h2>Thông tin đăng nhập</h2><br>
                <form method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Username</span>
                        </div>
                        <input type="text" class="form-control" name="username" value="'.$std['username'].'">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input type="password" class="form-control" name="password" value="'.$std['password'].'">
                    </div>
                    Chức vụ:<br>
                    <input type="radio" name="position" value="manage" '.$manage.'>
                    <label for="manage">Quản lý</label>
                    <input type="radio" name="position" value="staff" '.$staff.'>
                    <label for="staff">Nhân viên</label><br><br>
                    <input type="submit" name="login" class="btn-success" value="Submit">
                </form>
            </div>
              
                ';
                }
            ?>  
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/account_manager.js"></script>
    <script src="js/search_account.js"></script>    
    <script src="js/delete_account.js"></script>   
</body>

</html>
    <!-- end of header -->
    

    <!-- About section -->
   