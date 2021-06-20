
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-awesome -->
    <link rel="stylesheet" href="./fontawesome-free-5.12.1-web/css/all.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/employeePage.css"/>
    <link rel="stylesheet" href="./css/h_f.css" />
    <title>Employee Page</title>
</head>
<header>
    <div class="container-fluid" style="position: relative;">
        <nav class="navbar navbar-expand-lg fixed-top py-3 header">
            <div><a href="mainPage.php" class="navbar-brand text-uppercase font-weight-bold">Nova Restaurant</a>
                <!-- <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button> -->
                <div id="navbarSupportedContent" class="navbar-collapse" style="position: fixed;right:20px;top:10px">
                    <button class="btn btn-info ml-auto">Đăng xuất</button>
                </div>
            </div>
        </nav>
    </div>
</header>
<body style="top:80px;">

    <div class="btn-group" role="group" style="width:100%">
        <button type="button" class="btn btn-secondary" onclick="window.open('account_management.php','_self')">Quản lý tài khoản</button>
        <div class="dropup">
        <button class="dropbtn">Quản lý nhà hàng</button>
        <div class="dropup-content">
            <a href="managermenu.php">Quản lý menu</a>
            <a href="table_management.php">Quản lý bàn</a>
            <a href="../OrderManager/om.php">Quản lý hóa đơn</a>
        </div>
        </div>
        <button type="button" class="btn btn-secondary active">Thông tin tài khoản</button>
    </div>
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
                        <input type="text" class="form-control" name="name" placeholder="'.$std['name'].'" class = "info">
                        <label for="CMND" class = "info" >CMND/CCCD: </label>
                        <input type="text" class="form-control" name="CMND" placeholder = "'.$std['identity card'].'" class = "info">
                        <label for="phone"class = "info" >SDT: </label>
                        <input type="tel" class="form-control" name="phone" placeholder = "'.$std['phone number'].'" class = "info">
                        <label for="email" class = "info">Email: </label>
                        <input type="email" class="form-control" name="email" placeholder="'.$std['email'].'" class = "info" />
                        <label for="job" class = "info">Chức vụ: </label>
                        <input type="text" class="form-control" name="job" placeholder = "'.$std['position'].'" class = "info">
                    </fieldset>
                </form>
            ';}
        }
        
        ?>
    </section>
</body>
<footer class="text-center text-lg-start bg-light text-muted" style="top:150px">
        
        <!-- Section: Links  -->
        <section class="p-1">
        <div class="text-left text-md-start mt-1">
            <!-- Grid row -->
            <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h4 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-utensils"></i>Nova Restaurant
                </h4>
                <p>
                We are the best choice for you
                
                </p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                Contact
                </h6>
                <p><i class="fas fa-home me-3"></i> Đại Học Bách Khoa TP.HCM</p>
                <p>
                <i class="fas fa-envelope me-3"></i>
                novateam@gmail.com
                </p>
                <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        </section>
        <!-- Section: Links  -->
    
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="#">NovaRestaurant.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Hàm để scroll -->
    <script>
        $(function () {
            $(window).on('scroll', function () {
                if ( $(window).scrollTop() > 10 ) {
                    $('.navbar').addClass('active');
                } else {
                    $('.navbar').removeClass('active');
                }
            });
        });
    </script>
</html>

