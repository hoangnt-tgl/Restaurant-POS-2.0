
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-awesome -->
    <link rel="stylesheet" href="./fontawesome-free-5.12.1-web/css/all.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Employee Page</title>
</head>
<body>
    <header class="employ-header">
        <a href="mainPage.html" class = "logo-container"><img src="./images/logo.png" alt="restaurant's logo" class =" logo"></a>
        <h2 class = "restaurant-name">nova restaurant</h2>
        <div class="logout">
            <a href="mainPage.html"><button class="btn logout-btn"> Đăng xuất </button></a>
        </div>
    </header>

    <nav class="navbar">
        <ul class="navbar-items">
            <li><a href="#" class="nav-link active">Thông tin tài khoản</a></li>
            <li><a href="restaurantManagement.html" class="nav-link">Quản lý nhà hàng</a></li>
            <li><a href="account_manager.php" class="nav-link">Quản lý tài khoản</a></li>
        </ul>
    </nav>

    <section class="emp-info">
        <div class="avatar-container">
            <img src="./images/avatar.png" alt="emolyee's picture" class = "avatar">
        </div>
        <?php
        require_once('dbhelp.php');
        session_start();
        $username = $_SESSION['username'];
        $sql = 'select * from account';
        $accountList = executeResult($sql);
        foreach($accountList as $std){
            if ($std['username'] == $username){
                echo'
                <form action="" class="infos">
                    <fieldset disabled="disabled" class = "read-only">
                        <label for="name" class = "info">Name: </label>
                        <input type="text" name="name" placeholder="'.$std['name'].'" class = "info">
                        <br>
                        <br>
                        <label for="CMND" class = "info" >CMND/CCCD: </label>
                        <input type="text" name="CMND" placeholder = "'.$std['identity card'].'" class = "info">
                        <br>
                        <br>
                        <label for="phone"class = "info" >SDT: </label>
                        <input type="tel" name="phone" placeholder = "'.$std['phone number'].'" class = "info">
                        <br>
                        <br>
                        <label for="email" class = "info">Email: </label>
                        <input type="email" name="email" placeholder="'.$std['email'].'" class = "info" />
                        <br>
                        <br>
                        <label for="job" class = "info">Chức vụ: </label>
                        <input type="text" name="job" placeholder = "'.$std['position'].'" class = "info">
                    </fieldset>
                </form>
            ';}
        }
        
        ?>
    </section>
</body>
</html>