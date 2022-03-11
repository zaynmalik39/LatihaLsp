<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-box">
   <center> <h3>Welcome Our Shop</h3> </center>

    <form action="process.php" method="POST">
        <label>Username</label>
        <input type="text" name="username" class="form-control"><br /> <br/>

        <label>Password</label>
        <input type="password" name="password" class="form-control"><br /> <br/>

        <button type="submit" class="btn">Log in</button><br /> <br/>
        <div class="reg">
           <center> <small>Don't have an account yet ?</small> </center>
           <center> <a href="../register/index.php"><span>Register</span></a> </center>
        </div>

    </form>
</div>
</body>
</html>