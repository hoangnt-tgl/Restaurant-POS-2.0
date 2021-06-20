<?php
require_once('dbhelp.php');

if(!empty($_POST)){
    $note = $picture =  $name = $price = $ammount = '';
    if (isset($_POST['note'])){
        $note = $_POST['note'];
    }
    if (isset($_POST['picture'])){
        $picture = $_POST['picture'];
    }
    
    if (isset($_POST['food-name'])){
        $name = $_POST['food-name'];
    }
    
    if (isset($_POST['food-price'])){
        $price = $_POST['food-price'];
    }
    
    if (isset($_POST['food-ammount'])){
        $ammount = $_POST['food-ammount'];
    }
    
    $sql = "insert into menu(ID, Name, Price, Ammount, Note, Picture, Decription ) value ('','$name','$price','$ammount','$note','picture','')";
    execute($sql);
}
?>

<?php
    $sql = 'select * from menu';
    $menuList = executeResult($sql);
    foreach($menuList as $std){
        echo '
        <a>'.$std['Name'].'</a>
        ';
    }
    ?>
<form method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input required="true" type="text" class="form-control" name="food-name">
                    </div>
                    
                    <!-- <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input type="date" class="form-control" id="birthday">
                    </div> -->
                    <div class="form-group">
                        <label for="identity card">Identity card:</label>
                        <input type="text" class="form-control" name="food-price">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="food-ammount">
                    </div>    
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input required="true" type="text" class="form-control" name="note">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input required="true" type="text" class="form-control" name="picture">
                    </div>

                    <button class="btn btn-success">Register</button>
                </form>

    