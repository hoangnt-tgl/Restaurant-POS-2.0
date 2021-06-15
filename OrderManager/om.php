<!-- Su dung dbhelper.php -->
<?php
require_once('dbhelper.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/om.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg fixed-top py-3">
            <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">NOVA RESTAURANT</a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
                
            </div>
        </nav>
    </header>


    <!-- For demo purpose -->
<!-- <div class="container">
    <div class="pt-5 text-white">
        <header class="py-5 mt-5">
            <h1 class="display-4">Transparent Navbar</h1>
            <p class="lead mb-0">Using Bootstrap 4 and Javascript, create a transparent navbar which changes its style on scroll.</p>
            <p class="lead mb-0">Snippet by
                <a href="https://bootstrapious.com" class="text-white">
                    <u>Bootstrapious</u></a>
            </p>
        </header>
        <div class="py-5">
            <p class="lead">Lorem ipsum dolor sit amet, <strong class="font-weight-bold">consectetur adipisicing </strong>elit. Explicabo consectetur odio voluptatum facere animi temporibus, distinctio tempore enim corporis quam <strong class="font-weight-bold">recusandae </strong>placeat! Voluptatum voluptate, ex modi illum quas nam distinctio.</p>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="py-5">
            <p class="lead">Lorem ipsum dolor sit amet, <strong class="font-weight-bold">consectetur adipisicing </strong>elit. Explicabo consectetur odio voluptatum facere animi temporibus, distinctio tempore enim corporis quam <strong class="font-weight-bold">recusandae </strong>placeat! Voluptatum voluptate, ex modi illum quas nam distinctio.</p>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
</div> -->

    <div class="container-fluid">
        <div class="pt-5">
            <h2 class="text-center py-5 display-4">
                            Overview
                        </h2>
                    
                    <div class="row justify-content-center">
                        <div class="col-4" style="text-align: center;">
                            <h4 class="display-5">
                                Total
                            </h4>
<?php
if(isset($_POST['se'])){
    $date = $_POST['search'];
    // $newDate =  date("Y-m-d", strtotime($date));
    $sql = "select * from om where date = '$date'";
}
else{
    if(isset($_POST["day"])){
        $sql = 'select * from om where date = current_date;';
    }
    else if(isset($_POST["month"])){
        $sql = 'select * from om where month(date) = (select month(current_date())) and year(date) = (select year(current_date()))';
    }
    else if(isset($_POST["year"])){
        $sql = 'select * from om where year(date) = (select year(current_date()));';
    }
    else if(isset($_POST["all"])){
        $sql = 'select * from om';
    }
    else{
        $sql = 'select * from om';
    }
}
$orderList = executeResult($sql);

$sum = 0;
foreach($orderList as $od){
    $sum += $od['price'];
}
echo '<h4 class="display-5">'. $sum.'</h4>';
?>
                        </div>
                        <div class="col-4" style="text-align: center;">
                            <h4 class="display-5">
                                Number
                            </h4>
        <?php
        echo '<h4 class="display-5"> '.count($orderList).'</h4>';
        ?>
                        </div>
                    </div>
            </div>
    </div>
    <div class="container">
        <div class="panel panel-primary">
                
            <div class="panel-body">
                <div class="row justify-content-end" style="margin-top: 10px;">
                    <div class="col-3 col-sm-3">
                        <form method="post">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="search">
                                <div class="input-group-append">
                                    <input type="submit" class="btn btn-success" name="se" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PRICE</th>
                            <th>
                                <li class="nav-item dropdown" style="list-style-type: none;" method="post">
                                    <a href="#" class="dropdown-toggle" id="navbardrop" data-toggle="dropdown" style="color: #000;">
                                        DATE
                                    </a>
                                    <div class="dropdown-menu">
                                        
                                        <!-- Nhận dữ liệu từ button -->
                        
                                        <form method="post">
                                            <button type="submit" class="dropdown-item" name="day">DAY</button>
                                            <button type="submit" class="dropdown-item" name="month">MONTH</button>
                                            <button type="submit" class="dropdown-item" name="year">YEAR</button>
                                            <button type="submit" class="dropdown-item" name="all">ALL</button>
                                        </form>
                                    </div>
                                </li>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$index = 1;

foreach ($orderList as $od){
    $date = $od['date'];
    $newDate = date("d/m/Y", strtotime($date));
    echo '<tr>
            <td>'.$od['id'].'</td>
            <td>'.$od['price'].'</td>
            <td>'.$newDate.'</td>
        ';
    switch ($od['method']){
        case 'takeaway':
            echo '<td><button type="button" 
            data-sid="'.$od['id'].'" 
            data-snumber="'.$od['number'].'"
            data-sdate="'.$newDate.'"
            data-spayment="'.$od['payment'].'"
            data-sprice="'.$od['price'].'"
            data-smethod="'.$od['method'].'"
            
            class="btn btn-primary" data-toggle="modal" data-target="#takeaway">Detail</button></td>
                </tr>';
            break;
        case 'delivery':
            echo '<td><button type="button" 
            data-sid="'.$od['id'].'" 
            data-snumber="'.$od['number'].'"
            data-sdate="'.$newDate.'"
            data-spayment="'.$od['payment'].'"
            data-sprice="'.$od['price'].'"
            data-smethod="'.$od['method'].'"
            data-sname="'.$od['name'].'"
            data-sphone="'.$od['phone'].'"
            data-semail="'.$od['email'].'"
            data-saddress="'.$od['address'].'"
            
            class="btn btn-primary" data-toggle="modal" data-target="#delivery">Detail</button></td>
            </tr>';
            break;
        case 'restaurant':
            echo '<td><button type="button" 
            data-sid="'.$od['id'].'" 
            data-snumber="'.$od['number'].'"
            data-sdate="'.$newDate.'"
            data-spayment="'.$od['payment'].'"
            data-sprice="'.$od['price'].'"
            data-smethod="'.$od['method'].'"
            data-stable="'.$od['tableR'].'"

            class="btn btn-primary" data-toggle="modal" data-target="#restaurant">Detail</button></td>
            </tr>';
            break;
    }
    $id = $od['id'];
}
?>              
                
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
    <!-- Modal takeaway -->
    
    <div class="modal" id="takeaway">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="lid"></label>
                    <hr>
                    <label class="lnumber"></label>
                    <hr>
                    <label class="ldate"></label>
                    <hr>
                    <label class="lpayment"></label>
                    <hr>
                    <label class="lprice"></label>
                    <hr>
                    <label class="lmethod"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal delivery -->

    <div class="modal" id="delivery">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="kid"></label>
                    <hr>
                    <label class="knumber"></label>
                    <hr>
                    <label class="kdate"></label>
                    <hr>
                    <label class="kpayment"></label>
                    <hr>
                    <label class="kprice"></label>
                    <hr>
                    <label class="kmethod"></label>
                    <hr>
                    <label class="kname"></label>
                    <hr>
                    <label class="kphone"></label>
                    <hr>
                    <label class="kemail"></label>
                    <hr>
                    <label class="kaddress"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal restaurant -->

    <div class="modal" id="restaurant">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="jid"></label>
                    <hr>
                    <label class="jnumber"></label>
                    <hr>
                    <label class="jdate"></label>
                    <hr>
                    <label class="jpayment"></label>
                    <hr>
                    <label class="jprice"></label>
                    <hr>
                    <label class="jmethod"></label>
                    <hr>
                    <label class="jtable"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $(function () {
            $(window).on('scroll', function () {
                if ( $(window).scrollTop() > 10 ) {
                    $('.navbar').addClass('active');
                } else {
                    $('.navbar').removeClass('active');
                }
            });
        });
        var modal = $(this);
        $('#takeaway').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var data_id = button.data('sid')
            var data_number = button.data('snumber')
            var data_date = button.data('sdate')
            var data_payment = button.data('spayment')
            var data_price = button.data('sprice')
            var data_method = button.data('smethod')
    
            // modal.find('.modal-body label').text(data_id)
            $('.modal-body .lid').text(data_id)
            $('.modal-body .lnumber').text(data_number)
            $('.modal-body .ldate').text(data_date)
            $('.modal-body .lpayment').text(data_payment)
            $('.modal-body .lprice').text(data_price)
            $('.modal-body .lmethod').text(data_method)
        });
        
        $('#delivery').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var data_id = button.data('sid')
            var data_number = button.data('snumber')
            var data_date = button.data('sdate')
            var data_payment = button.data('spayment')
            var data_price = button.data('sprice')
            var data_method = button.data('smethod')
            var data_name = button.data('sname')
            var data_phone = button.data('sphone')
            var data_email = button.data('semail')
            var data_address = button.data('saddress')
            
            // modal.find('.modal-body label').text(data_id)
            $('.modal-body .kid').text(data_id)
            $('.modal-body .knumber').text(data_number)
            $('.modal-body .kdate').text(data_date)
            $('.modal-body .kpayment').text(data_payment)
            $('.modal-body .kprice').text(data_price)
            $('.modal-body .kmethod').text(data_method)
            $('.modal-body .kname').text(data_name)
            $('.modal-body .kphone').text(data_phone)
            $('.modal-body .kemail').text(data_email)
            $('.modal-body .kaddress').text(data_address)
        });

        $('#restaurant').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var data_id = button.data('sid')
            var data_number = button.data('snumber')
            var data_date = button.data('sdate')
            var data_payment = button.data('spayment')
            var data_price = button.data('sprice')
            var data_method = button.data('smethod')
            var data_table = button.data('stable')
    
            // modal.find('.modal-body label').text(data_id)
            $('.modal-body .jid').text(data_id)
            $('.modal-body .jnumber').text(data_number)
            $('.modal-body .jdate').text(data_date)
            $('.modal-body .jpayment').text(data_payment)
            $('.modal-body .jprice').text(data_price)
            $('.modal-body .jmethod').text(data_method)
            $('.modal-body .jtable').text(data_table)
        });
    </script>


    
</body>
</html>