<?php 
session_start(); 
require_once("dbhelp.php");

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM account WHERE username='$uname' AND password ='$pass'";

		$result = executeResult($sql);
        
        foreach($result as $std){
         
            if ($std['username'] === $uname && $std['password'] === $pass) {
                $_SESSION['username'] = $uname;
                header("Location: employeePage.php");
                exit();
            }else{
                header("Location: login.php?error=Incorect User name or password");
                exit();
            }
        }
	}	
}else{
	header("Location: login.php");
	exit();
}