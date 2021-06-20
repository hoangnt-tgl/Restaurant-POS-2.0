<?php

if (!empty($_POST)) {
    $s_fullname = $s_phone = $s_Email = $s_Address = $s_method = $s_Table = '';
	if (isset($_POST['Name'])) {
		$s_fullname = $_POST['Name'];
	}
	if (isset($_POST['Phone'])) {
		$s_phone = $_POST['Phone'];
	}
    if (isset($_POST['Email'])) {
		$s_Email = $_POST['Email'];
	}
    if (isset($_POST['Address']) && $_POST['Address']!='') {
		$s_Address = $_POST['Address'];
	}
    if (isset($_POST['button_table'])) {
		$s_Table = $_POST['button_table'];
	}
    /////
    if ($s_fullname != '' and $s_Email == ''){
        $s_method ='takeawway';
    }
    else if ($s_fullname != '' and $s_Email != ''){
        $s_method ='delivery';
    }
    else{
        $s_method ='restaurant';
    }
    require_once ('dbhelp.php');
    $sql = "INSERT INTO `khanh_hang`(`TEN`, `SDT`, `EMAIL`, `DIA_CHI`, `SO_BAN`, `PHUONG_THUC`, `THANH_TOAN`) 
    VALUES ('$s_fullname','$s_phone','$s_Email','$s_Address','$s_Table','$s_method','')";
    if ($s_Table != '') 
    {   $sql1 = " UPDATE `table` SET `status`='1' WHERE id = '$s_Table' ";
        execute($sql1);
    }
    execute($sql);
    require_once ('dbhelp.php');

    header('Location: paymentmethod.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/eatmethod.css">
    <style>
.btn-group-button1 {
    width: 25%;
    background: #0000007e;
    color: #fff;
    border-radius: 5px;
    margin-top: 20%;
    margin-left: 35%;
    padding-top: 5%;
    padding-bottom: 5%;
}
</style>
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
                    <a class="tablinks" href="mainPage.php">Home Page</a>
                    <a class="tablinks" href="clientmenu.php">Menu</a>
                </div>
            </div>
        </header>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0" id ='manyitem'>
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

                <tr class="heading">
                    <td>Item</td>

                    <td>Price</td>
                </tr>
               
                <?php
                    require_once('dbhelp.php');
                    $sql = 'select * from mon';
                    $List = executeResult($sql);
                    $sql1 = 'SELECT * FROM `table`';
                    $List1 = executeResult($sql1);
                ?>

            </table>
        </div>
        <div class="button-box">
            <button class="button-body">
                <div class="button-box-em">
                    <a class="button-box-em-body" href="#popup1">TAKEAWAY</a>
                </div>
            </button>
            <button class="button-body">
                <div class="button-box-em">
                    <a class="button-box-em-body" href="#popup2">DELIVERY</a>
                </div>
            </button>
            <button class="button-body">
                <div class="button-box-em">
                    <a class="button-box-em-body" href="#popup3">JOIN TABLE</a>
                </div>
            </button>
            <button class="button-body">
                    <a class="button-box-em-body" href="cart.php">BACK</a>
            </button>
        </div>
    </div>

    <div id="popup1" class="overlay">
        <div class="login-box"  >
            <h2>TAKEAWAY</h2>
            <form method="post">
                <div class="user-box">
                    <input type="text" name="Name" id = "Name" >
                    <label>Name</label>
                </div> 

                <div class="user-box">
                    <input type="text" name="Phone" id = "Phone" >
                    <label>Phone Number</label>
                </div>
                
                <button class='btn-group-button1' > Continue </button>
            </form>
        </div>
    </div>

    <div id="popup2" class="overlay">
        <div class="login-box">
            <h2>DELIVERY</h2>
            <form method="post">
                <div class="user-box">
                    <input type="text" name="Name" id = "Name" >
                    <label>Name</label>
                </div> 
                <div class="user-box">
                    <input type="text" name="Phone" id = "Phone" >
                    <label>Phone Number</label>
                </div>
                <div class="user-box">
                    <input type="text" name="Email" >
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="text" name="Address" >
                    <label>Address</label>
                </div>
                    <button class='btn-group-button1' > Continue </button>
            </form>
        </div>
    </div>

    <div id="popup3" class="overlay">
        <div class="login-box">
            <h2>JOIN TABLE</h2>
            <form method="post">
                <div class= "btn-group" id = "check"> </div>
            </form>
        </div>
    </div>
    <footer>
    </footer>
    <script>
        var list_of_order = <?php echo json_encode($List); ?>;
        var total = 0;
        for (i = 0; i < list_of_order.length; i++)
        {
            var name_of_dish = list_of_order[i]['TEN'];
            var price_of_dish = list_of_order[i]['GIA'];
            document.getElementById("manyitem").innerHTML = document.getElementById("manyitem").innerHTML + '<tr class="item"> <td>'+name_of_dish + '</td><td>' + price_of_dish +' đ </td></tr>'
            total += parseInt(price_of_dish);
        }
        document.getElementById("manyitem").innerHTML += '<tr class="total"> <td></td><td>Total: '+total+' đ </td></tr>'
        //////
        var list_of_order1 = <?php echo json_encode($List1); ?>;
        for (i = 0; i < list_of_order1.length; i++)
        {
            var id_table = list_of_order1[i]['id'];
            var status = list_of_order1[i]['status'];
            if (status == '0') document.getElementById("check").innerHTML = document.getElementById("check").innerHTML + ' <button class="btn-group-button" name="button_table" value="'+id_table+'" >Table ' + id_table + '</button>'
        } 
    </script>
    
</body>

</html>
