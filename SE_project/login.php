<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-awesome -->
    <link rel="stylesheet" href="./fontawesome-free-5.12.1-web/css/all.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Login page</title>
</head>
<body>
    <section class="login">
        <article class="contact-form">
            <h3>Log in</h3>
            <form action="check_account.php" method="post">
                <div class="form-group">
                    <!-- inputs -->
                    <?php if (isset($_GET['error'])) { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	            <?php } ?>
                    <input type="text" placeholder="User Name" class="form-control" name="uname">
                    <input type="password" placeholder="Password" class="form-control" name="password">
                    <button type="submit" class="login-btn btn">Log in</button>
                </div>
            </form>
            <!-- button -->
        </article>
    </section>
    
</body>
</html>
