<?php

if (!empty($_POST)) 
{
      require_once('dbhelp.php');
      $sql_mon = 'select * from mon';
      $List_mon = executeResult($sql_mon);
      $sql_kh = 'select * from khanh_hang';
      $List_kh = executeResult($sql_kh);
    if (!empty($List_kh) and !empty($List_mon) ){
      $total = 0;
      $i = 0;
      for ($i ; $i <  count($List_mon) ; $i++)
      {
          $price_of_dish =  $List_mon[$i]['GIA'];
          $total += ($price_of_dish);
      }
      $name_ = $List_kh[0]['TEN'];
      $std_ = $List_kh[0]['SDT'];
      $email_ = $List_kh[0]['EMAIL'];
      $address_ = $List_kh[0]['DIA_CHI']; 
      $table_ = $List_kh[0]['SO_BAN'];
      $method_ = $List_kh[0]['PHUONG_THUC'];
      $payment_ = $List_kh[0]['THANH_TOAN'];
     require_once ('dbhelp.php');
     $sql_insert = " INSERT INTO `om`(`id`, `price`, `date`, `payment`, `method`, `number`, `name`, `phone`, `email`, `address`, `tableR`) 
     VALUES ('','$total','2021-06-20','$payment_','$method_',' $i','$name_','$std_','$name_','$email_','$table_')";
     $sql_delete = " DELETE FROM `khanh_hang` WHERE 1=1";
     execute($sql_delete);
     execute($sql_insert);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./reviewmain.css">
    <style>
.button {
  background-color: rgb(78, 213, 218);
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-left:  80%;
  margin-top:  0%;
  cursor: pointer;
  height: 50px;
width: 100px;
}
.button1 {font-size: 10px;}

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
                    <a class="tablinks" href="mainPage.html">Home Page</a>
                    <a class="tablinks" href="../Menu/clientmenu.html">Menu</a>
                </div>
            </div>
        </header>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0"  id ='manyitem' >
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
                <?php
                require_once('dbhelp.php');
                $sql = 'select * from mon';
                $List = executeResult($sql);
                $sql1 = 'select * from khanh_hang';
                $List1 = executeResult($sql1);
                    ?>
            </table>
        </div>
        <form method="post">
            <input type = "hidden" name = "1" value = "1" >
            <button class="button button1"> Complete </button>
        </form>
        
    </div>
    <script>
        var list_of_order = <?php echo json_encode($List); ?>;
        var list_of_order1 = <?php echo json_encode($List1); ?>;
        var name = list_of_order1[0]['TEN'];
        var std = list_of_order1[0]['SDT'];
        var email = list_of_order1[0]['EMAIL'];
        var address = list_of_order1[0]['DIA_CHI']; 
        var table = list_of_order1[0]['SO_BAN'];
        var method = list_of_order1[0]['PHUONG_THUC'];
        var payment = list_of_order1[0]['THANH_TOAN'];
        document.getElementById("manyitem").innerHTML = document.getElementById("manyitem").innerHTML + '<tr class="heading"><td>Infomation of client </td><td></td><tr class="item"><td>Name</td><td> '+name+' </td></tr> <tr class="item"><td>Phone number </td> <td> '+std+' </td> </tr><tr class="item"> <td> Email </td><td> '+ email +'  </td> </tr><tr class="item"><td> Address </td><td> '+ address +'  </td> </tr> <tr class="item"> <td> Table </td> <td> '+ table +'  </td></tr><tr class="heading">  <td>Infomation of client </td><td></td> </tr><tr class="item"><td> '+method+' </td> <td> confirmed </td> </tr><tr class="heading"><td>Payment Method</td> <td> Done </td> </tr> <tr class="details"><td>'+ payment + '</td><td>100%</td></tr><tr class="heading"> <td>Item</td><td>Price</td> </tr>'
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
