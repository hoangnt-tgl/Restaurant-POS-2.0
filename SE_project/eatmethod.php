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
    if (isset($_POST['Address'])) {
		$s_Address = $_POST['Address'];
	}
    if (isset($_POST['Table'])) {
		$s_Table = $_POST['Table'];
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
    <link rel="stylesheet" href="./eatmethodmain.css">
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
                    <a class="button-box-em-body" href="cart.html">BACK</a>
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
             
                <a href="#">
                    <button > Confirm </button>
                    <a href="paymentmethod.php"> Continue </a>
                </a>
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
                <a href="#">
                    <button> Confirm </button>
                    <a href="paymentmethod.php"> Continue </a>
                </a>
            </form>
        </div>
    </div>

    <div id="popup3" class="overlay">
        <div class="login-box">
            <h2>JOIN TABLE</h2>
            <form method="post">
                <div class="btn-group">
                    <input type = "hidden" name = "Table" value = "huy" />
                    <button class='btn-group-button' name = "huy" value = "1">Table 1</button>
                    <button class='btn-group-button'>Table 2</button>
                    <button class='btn-group-button'>Table 3</button>
                    <button class='btn-group-button'>Table 4</button>
                    <button class='btn-group-button'>Table 5</button>
                    <button class='btn-group-button'>Table 6</button>
                    <button class='btn-group-button'>Table 7</button>
                    <button class='btn-group-button'>Table 8</button>
                    <button class='btn-group-button'>Table 9</button>
                    <button class='btn-group-button'>Table 10</button>
                    <button class='btn-group-button'>Table 11</button>
                    <button class='btn-group-button'>Table 12</button>
                    <button class='btn-group-button'>Table 13</button>
                    <button class='btn-group-button'>Table 14</button>
                    <button class='btn-group-button'>Table 15</button>
                    <button class='btn-group-button'>Table 16</button>
                    <button class='btn-group-button'>Table 17</button>
                    <button class='btn-group-button'>Table 18</button>
                    <button class='btn-group-button'>Table 19</button>
                    <button class='btn-group-button'>Table 20</button>
                </div>
                <a href="#">
                    <a href="paymentmethod.php"> Continue </a>
                </a>
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
    </script>
</body>

</html>
