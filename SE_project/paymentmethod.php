<?php

if (!empty($_POST)) {
    $s_payment = '';
	if (isset($_POST['payment'])) {
		$s_payment = $_POST['payment'];
	}
    require_once ('dbhelp.php');
    $sql = "UPDATE `khanh_hang` SET `THANH_TOAN`= '$s_payment' WHERE 1";
    execute($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./paymentmethodmain.css">
    <script src='./main.js'></script>
</head>

<body>
    <div id="box">
        <header id="site-header">
            <div class="container_header">
                <div id="img_header">
                    <img src="https://st4.depositphotos.com/33122168/39445/v/450/depositphotos_394452548-stock-illustration-food-logo-food-delivery-logo.jpg" vspace="5" width="200px">
                </div>
                <div id="text_header">
                    <h1> NOVA RESTAURANT </h1>
                </div>
                <div class="tab">
                    <a class="tablinks" href="mainPage.html">Home Page</a>
                    <a class="tablinks" href="../Menu/clientmenu.html">Menu</a>
                </div>
            </div>
        </header>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0" id ='manyitem' >
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    Invoice
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tr>
                <?php
                require_once('dbhelp.php');
                $sql = 'select * from mon';
                $List = executeResult($sql);
                $sql1 = 'select * from khanh_hang';
                $List1 = executeResult($sql1);
                    ?>
            </table>
        </div>
        <div class="button-box">
            <button class="button-body">
                <div class="button-box-em">
                    <a class="button-box-em-body" href="#popup1">MoMo</a>
                </div>
            </button>
            <button class="button-body">
                    <a class="button-box-em-body" href="#popup2">Cash</a>
            </button>
            <button class="button-body">
                <a class="button-box-em-body" href="#popup3">Cancel Order</a>
            </button>
        </div>
    </div>

    <div id="popup1" class="overlay">
        <div class="login-box">
            <h2> Payment Success </h2>
            <form method= "post">
                <div class="user-box">
                    <label>Thank you for using our service! See you soon.</label>
                    <input type = "hidden" name = "payment" value = "MoMo" >
                </div>
                <button> OKE </button>
                <a href="reviewindex.php"> Continue </a>
            </form>
        </div>
    </div>
    <div id="popup2" class="overlay">
        <div class="login-box">
            <h2> Payment Success </h2>
            <form method= "post">
                <div class="user-box">
                    <label>Thank you for using our service! See you soon.</label>
                    <input type = "hidden" name = "payment" value = "Cash" >
                </div>
                <button> OKE </button>
                <a href="reviewindex.php"> Continue </a>
            </form>
        </div>
    </div>
    <div id="popup2" class="overlay">
        <div class="login-box">
            <h2> Warning </h2>
            <form>
                <div class="user-box">
                    <label> Are you sure you want to delete this order? </label>
                </div>

                <a href="./clientmenu.html"> Yes </a>
                <a href="./paymentmethod.php"> No </a>
            </form>
        </div>
    </div>
    <footer>

    </footer>

    <script>
        var list_of_order = <?php echo json_encode($List); ?>;
        var list_of_order1 = <?php echo json_encode($List1); ?>;
        var name = list_of_order1[0]['TEN'];
        var std = list_of_order1[0]['SDT'];
        var email = list_of_order1[0]['EMAIL'];
        var address = list_of_order1[0]['DIA_CHI']; 
        var table = list_of_order1[0]['SO_BAN'];
        var method = list_of_order1[0]['PHUONG_THUC'];
        document.getElementById("manyitem").innerHTML = document.getElementById("manyitem").innerHTML + '<tr class="heading"><td>Infomation of client </td><td></td><tr class="item"><td>Name</td><td> '+name+' </td></tr> <tr class="item"><td>Phone number </td> <td> '+std+' </td> </tr><tr class="item"> <td> Email </td><td> '+ email +'  </td> </tr><tr class="item"><td> Address </td><td> '+ address +'  </td> </tr> <tr class="item"> <td> Table </td> <td> '+ table +'  </td></tr><tr class="heading">  <td>Infomation of client </td><td></td> </tr><tr class="item"><td> '+method+' </td> <td> confirmed </td> </tr><tr class="heading"> <td>Item</td><td>Price</td> </tr>'
        var total = 0;
        for (i = 0; i < list_of_order.length; i++)
        {
            var name_of_dish = list_of_order[i]['TEN'];
            var price_of_dish = list_of_order[i]['GIA'];
            document.getElementById("manyitem").innerHTML = document.getElementById("manyitem").innerHTML + '<tr class="item"> <td>'+name_of_dish + '</td><td>' + price_of_dish +' đ </td></tr>'
            total += parseInt(price_of_dish);
        }
        document.getElementById("manyitem").innerHTML += '<tr class="total"> <td></td><td>Total: '+total+' đ </td></tr>' 
    </script>

</body>

</html>
