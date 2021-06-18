<?php
if(!empty($_POST)){
    $_username = $_password = $_position = $_name = $_gender = $_id_card = $_phone = $_email = $_address = '';
    if (isset($_POST['username'])){
        $_username = $_POST['username'];
    }
    if (isset($_POST['password'])){
        $_password = $_POST['password'];
    }
    if (isset($_POST['position'])){
        $_position = $_POST['position'];
    }
    if (isset($_POST['name'])){
        $_name = $_POST['name'];
    }
    if (isset($_POST['gender'])){
        $_gender = $_POST['gender'];
    }
    if (isset($_POST['id_card'])){
        $_id_card = $_POST['id_card'];
    }
    if (isset($_POST['phone'])){
        $_phone = $_POST['phone'];
    }
    if (isset($_POST['email'])){
        $_email = $_POST['email'];
    }
    if (isset($_POST['address'])){
        $_address = $_POST['address'];
    }
    require_once('dbhelp.php');
    $sql = "insert into account(username, password, position, name, gender, `identity card`, `phone number`, email, address) value ('$_username','$_password','$_position','$_name','$_gender','$_id_card','$_phone','$_email','$_address')";
    execute($sql);
    header('Location: account_manager.php');
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Account</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add Account</h2>
			</div>
			<div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="name">Full name:</label>
                        <input required="true" type="text" class="form-control" name="name">
                    </div>
                    
                    <!-- <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input type="date" class="form-control" id="birthday">
                    </div> -->
                    <div class="form-group">
                        <label for="gender">Gender:</label><br>
                        <input required="true" type="radio" name="gender" value="male">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="female">
                        <label for="female">Female</label>
                    </div>
                    <div class="form-group">
                        <label for="identity card">Identity card:</label>
                        <input type="text" class="form-control" name="id_card">
                    </div>
                    <div class="form-group">
                        <label for="name">Phone number:</label>
                        <input type="tel" class="form-control" placeholder="10 số" pattern="[0]{1}[0-9]{9}" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address">
                    </div>    
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input required="true" type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input required="true" type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirmation_pwd">Confirmation Password:</label>
                        <input required="true" type="password" class="form-control" name="confirmation_pwd">
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label><br>
                        <input required="true" type="radio" name="position" value="manage">
                        <label for="manage">Manage</label>
                        <input type="radio" name="position" value="staff">
                        <label for="staff">Staff</label>
                    </div>
                    <button class="btn btn-success">Register</button>
                </form>
			</div>
		</div>
	</div>
</body>

</html>