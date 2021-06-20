<?php
require_once('dbhelp.php');
if(!empty($_GET['delete'])){
  $idtable = '';
  $idtable = $_GET['idtable'];
  $sql = "delete from `table` where id = $idtable;";
  execute($sql);
}
else if(!empty($_GET['deleteall'])){
  $sql = "delete from `table`;";
  execute($sql);
  $sql = "ALTER TABLE `table` DROP id;";
  execute($sql);
  $sql = "ALTER TABLE  `table` ADD `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
  execute($sql);
}
else if(!empty($_GET['addtable'])){
  $num = 0;
  $num = $_GET['numtable'];
  for ($i=0;$i<$num;$i++){
    $sql = "insert into `table` (`id`, `status`) VALUES (NULL, '0')";
    execute($sql);
  }
}
else if(!empty($_GET['resetall'])){
  $sql = "update `table` set `status` = '0' WHERE `table`.`status` = 1";
    execute($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-awesome -->
    <link rel="stylesheet" href="./fontawesome-free-5.12.1-web/css/all.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="./css/employeePage.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/h_f.css"/>
    <title>Table Manegement</title>
</head>
<div class="container-fluid" style="position: relative;">
        <nav class="navbar navbar-expand-lg fixed-top py-3 header">
            <div><a href="mainPage.html" class="navbar-brand text-uppercase font-weight-bold">Nova Restaurant</a>
                <!-- <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button> -->
                <div id="navbarSupportedContent" class="navbar-collapse" style="position: fixed;right:20px;top:10px">
                    <button class="btn btn-info ml-auto">Đăng xuất</button>
                </div>
            </div>
        </nav>
    </div>
<body style="top:80px">
    
    <div class="btn-group" role="group" style="width:100%">
        <button type="button" class="btn btn-secondary" onclick="window.open('account_management.php','_self')">Quản lý tài khoản</button>
        <div class="dropup">
        <button class="dropbtn">Quản lý nhà hàng</button>
        <div class="dropup-content">
            <a href="#">Quản lý menu</a>
            <a href="table_management.php">Quản lý bàn</a>
            <a href="../OrderManager/om.php">Quản lý hóa đơn</a>
        </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="window.open('employeePage.php','_self')">Thông tin tài khoản</button>
    </div>
    <div class="btn-group" role="group" style="width:80%;left:10%;margin:10px">
        <button class="tablink btn btn-info active" onclick="filterSelection('all')" id="defaultOpen">Tất cả</button>
        <button class="tablink btn btn-success" onclick="filterSelection('free')">Bàn trống</button>
        <button class="tablink btn btn-danger" onclick="filterSelection('busy')">Bàn có khách</button>
    </div>  
        
    <form method="get" onsubmit="return confirm('Are you sure?')">
    <div class="container">
    <?php
        $sql = 'select * from `table`';
        $tableList = executeResult($sql);
        foreach($tableList as $std){
            if ($std['status']==0){
                $st = "free";
            }
            else{
                $st = "busy";
            }
            echo'
            <div class="filterDiv '.$st.'">
            <label>'.$std['id'].'</label>
            <input type="radio" name="idtable" value="'.$std['id'].'">
        </div>
        ';}
    ?>
    </div>
      <div style="text-align:center">
        <br>
        <input class="btn btn-danger" type="submit" name="delete" value="Xóa bàn đã chọn">
        <input class="btn btn-danger" type="submit" name="deleteall" value="Xóa tất cả">
        <br><br>
        <input class="btn btn-warning" type="submit" name="reset" value="Reset bàn đã chọn">
        <input class="btn btn-warning" type="submit" name="resetall" value="Reset tất cả">
        <br><br>   
        <input class="btn btn-primary" type="submit" name="addtable" value="Thêm bàn">
        <input type="number" name="numtable" value="0">
      </div>      
    </form>
</body>
<footer>

</footer>
</html>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>