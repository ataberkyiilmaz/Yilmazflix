<?php
require 'config.php';
session_start();
if(!empty($_SESSION["username"])){
  header("Location: index.php");
}
if(isset($_POST["btn"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $string = "SELECT * FROM tb_user WHERE email = '$email'";
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["uid"] = $row["id"];
      $_SESSION["username"] = $row["username"];
      $_SESSION["userGroup"] = $row["userGroup"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/login_register_styles.css">
    <link rel="stylesheet" type="text/css" href="css/login_register_styles.css?<?=filemtime('css/login_register_styles.css');?>">
    <title>Sign In</title>
</head>

<body>
    <div class="main">
      <div class="logos">
            <a href="index.php">
                <img src="img/logo_transparent.png" alt="Home">
            </a>
</div>
        <div class="box1"><br><br>

            <div class="headers1">
                <h2>Sign In</h2><br><br>
            </div>

            <form action="" method="POST">
                <div class="headers1"><label for="email">Email</label></div>
                <input pattern='^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$'
                required type="text" id="email" name="email" value=""><br>
                <div class="headers1"><label for="pwd">Password</label></div>
                <input required type="password" id="password" name="password" value="" required value=""><br><br>
                <div class="checkbox">
                    <label><input type="checkbox" value="rememberMe" id="rememberMe"> Remember me</label>
                </div><br>
                <button type="submit" class="btn" name="btn">Sign In</button>
                <p class="text1">Don't you have an account? <a href="register.php">Register</a></p>
            </form>
            
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>