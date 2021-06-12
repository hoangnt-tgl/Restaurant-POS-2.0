<?php
require_once('dbhelp.php');
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
    <link rel="stylesheet" href="./css/account_manager.css" />
    <script src="js/account_manager.js"></script>
    <script src="js/search_account.js"></script>
</head>

<body>


    <!-- header -->
    <header>
        <div><img class="logo" src="images/logo.png" alt="Logo"></div>
        <div class="name">nova restaurant</div>
    </header>
    <div class="menu">
        <button class="btn3" href="menu.html">Quản lý tài khoản</button>
        <button class="btn3" onclick="openCity(event, 'LonDon')">Nhà hàng</button>
        <button class="btn3">Thông tin tài khoản</button>
    </div>
    <div id="myBtnContainer">
        <button class="tablink" onclick="filterSelection('all')" id="defaultOpen">Tất cả</button>
        <button class="tablink" onclick="filterSelection('staff')">Nhân viên</button>
        <button class="tablink" onclick="filterSelection('manage')">Quản lý</button>
        <button class="tablink" onclick="window.open('add_account.php','_self')">Thêm nhân viên</button>
        <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
    </div>  
    
    <div class="container" >
        <div id="myMenu">
            <?php
            $sql = 'select * from account';
            $accountList = executeResult($sql);
            foreach($accountList as $std){
                echo '
                <div class="filterDiv '.$std['position'].'"> 
                    <li onclick="openCity(event, \''.$std['username'].'\')"><a>'.$std['name'].'</a></li>
                </div>
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
                    <div class="left">
                        <img src="images/logo.png" alt="Avatar" style="width: 150px;">
                    </div>
                    <div class="right" style="background-color:#ddd;">
                        <form action="/php/action_page.php" >
                            <label>Họ và tên:</label><br>
                            <input type="text" value="'.$std['name'].'"><br>

                            <p>Giới tính:</p>
                            <input type="radio" name="gender" value="male" '.$male.'>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" '.$female.'>
                            <label for="female">Female</label><br>  

                            <label>CMND:</label><br>
                            <input type="text" id="cmnd" name="cmnd" value="'.$std['identity card'].'"><br>

                            <label>Số điện thoại:</label><br>
                            <input type="text" value="'.$std['phone number'].'"><br>

                            <label>Email:</label><br>
                            <input required="true" type="email" id="name" name="name" value="'.$std['email'].'"><br>
                            <label>Địa chỉ:</label><br>
                            <input type="text" id="name" name="name" value="'.$std['address'].'"><br>
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                        </form> 
                    </div>
                </div>
                <h2>Thông tin đăng nhập</h2>
                <form>
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" value="'.$std['username'].'"><br>
                    <label for="pwd">Password:</label><br>
                    <input type="password" id="pwd" name="pwd" value="'.$std['password'].'"><br>
                    <p>Chức vụ: </p>
                    <input type="radio" id="manage" name="position" value="manage" '.$manage.'>
                    <label for="manage">Quản lý</label><br>
                    <input type="radio" id="staff" name="position" value="staff" '.$staff.'>
                    <label for="staff">Nhân viên</label><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
              
                ';
                }
            ?>  
        </div>
    </div>
            
</body>

</html>
    <!-- end of header -->
    

    <!-- About section -->
   