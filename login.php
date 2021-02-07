<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>





    <div class="container">
        <form class="form-signin" method="POST">
        <h2>Login</h2>
        <input type="text" name="username" class="form-control" placeholder="Username" require>
        <input type="text" name="password" class="form-control" placeholder="Password" require>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button> 
        <a href="index.php" class="btn btn-lg btn-primary btn-block">Registration</a>
        </form>

    
    </div>

<?php

require('connect.php');

if(isset($_POST['username']) and isset($_POST['password'])){
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];

   $query= "SELECT * FROM users WHERE username='$username' and password='$password'";
   $result= mysqli_query($connection, $query) or die (mysqli_error($connection));
   $count= mysqli_num_rows($result);

   if($count==1){
       $_SESSION['username'] = $username;
   }else {
       $fsmsg= "Ошибка";
   }
}

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "Hello " . $username . " ";
    echo "<a href='index.php' class='btn btn-lg btn-primary btn-block'>Logout</a>";
}
?>



</body>
</html>