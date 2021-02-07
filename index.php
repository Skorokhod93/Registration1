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
<?php
require('connect.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];

    $query= "INSERT INTO users(username, password, email) VALUES('$username','$email','$password')";
    $result= mysqli_query ($connection, $query);

    if($result){
        $smsg= "Регистрация прошла успешно";
      } else{
        $fsmsg= "Ошибка";
      }

      
}

?>




    <div class="container">
        <form class="form-signin" method="POST">
        <h2>Registration</h2>
        <?php if (isset($smsg)){ ?> <div class="alert alert-success" role="alert"><?php echo $smsg; ?> </div><?php }?>
        <?php if (isset($fsmsg)){ ?> <div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?> </div><?php }?>
        <input type="text" name="username" class="form-control" placeholder="Username" require>
        <input type="text" name="email" class="form-control" placeholder="Email" require>
        <input type="text" name="password" class="form-control" placeholder="Password" require>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button> 
        <a href="login.php" class="btn btn-lg btn-primary btn-block">Login</a>
        </form>

    
    </div>





</body>
</html>