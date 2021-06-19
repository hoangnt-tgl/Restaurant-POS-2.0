<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/cart.css">
    <script src='./main.js'></script>

</head>
<!-- tieu de -->

<body>
    <!-- logo -->
    <header id="site-header">
        <!-- logo -->
        <div class="container_header">
            <div id="img_header">
                <img src="https://st4.depositphotos.com/33122168/39445/v/450/depositphotos_394452548-stock-illustration-food-logo-food-delivery-logo.jpg" vspace="5" width="200px">
            </div>
            <div id="text_header">
                <h1> NOVA RESTAURANT
                    <spand>
            </div>
        </div>
        <!-- tab -->
        <div class="tab">
            <a class="tablinks" href="mainPage.html">Home Page</a>
            <a class="tablinks" href="../Menu/clientmenu.html">Menu</a>
        </div>
    </header>
    <!-- ...........................-->
    <div id="cart_body">

        <div class="container">
            <section id="cart">
            <?php
                require_once('dbhelp.php');
                $sql = 'select * from mon';
                $List = executeResult($sql);
                
            ?>
            </section>

        </div>
    </div>
    <footer id="site-footer">
        
    </footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="./cart.js"></script>

    <script>
        var list_of_order = <?php echo json_encode($List); ?>;
        var total = 0;
        for (i = 0; i < list_of_order.length; i++){
            var link = list_of_order[i]['LINK'];
            var name_of_dish = list_of_order[i]['TEN'];
            var price_of_dish = list_of_order[i]['GIA'];
            document.getElementById("cart").innerHTML = document.getElementById("cart").innerHTML + '<article class="product"><header><a class="remove"><img src="'+link+'" alt=""><h3>Remove product</h3></a></header><div class="content"><h1>'+ name_of_dish +'</h1></div><footer class="content"><span class="qt-minus">-</span><span class="qt">1</span><span class="qt-plus">+</span><h2 class="full-price">'+price_of_dish+ 'đ</h2><h2 class="price">'+price_of_dish +'đ</h2></footer></article>'
            total += parseInt(price_of_dish);
        }
        document.getElementById("site-footer").innerHTML = document.getElementById("site-footer").innerHTML + '<div class="container clearfix"><div class="right"><h1 class="total">Total: <span> '+total+' </span>đ</h1><a class="btn" href="eatmethod.php"> Continue </a></div></div>'
    </script>
</body>

</html>
