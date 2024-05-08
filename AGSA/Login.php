<?php
session_start();
if(isset($_SESSION["users"])) {
header("Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="Css/Login1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AGSA AGENCY</title>
<style> 
Option{
    text-align: center;
    font-size: 12px;
    color: black;
    font-weight: bolder;
    border-radius: 30px;
}
Select{
    border: 2px solid Black;
    margin-left: 15vw;
    border-radius: 30px;
    font-weight: bolder;
}
</style>
</head>
<!--Login Form -->
<body>
<div class="body">
<form action="Login.php" method="post">
<img src="img/download.png" >

<h6>AGSA SECURITY AGENCY </h6>
<h1>Log<span>in</span> </h1>

<br> <label >Username</label><br>
<input type="text"  name="username" class="form-action" placeholder="Username" required></input> <br><br>

<label> Password </label><br>  
<input type="password" name="password" id="Show" class="" placeholder="Enter Password" required></Input><br><br>


  <br> <br>
<input type="checkbox" style="margin-left:70px;" class="showbtn" onclick="myFunction()">Show Password
<br> <br>
<div class="form-btn">
<input type="submit" name="submit" class="btn btn-info" value="Login" >
</div>  

<?php

include "Connection/database.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   $username = $_POST['username'];
   $password = $_POST['password'];
 
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";

  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  if($row["role"]=="user")
  { 
    $_SESSION["username"]=$username;
    header("Location: Userhome.php");
  }
  elseif($row["role"]=="admin"){

    $_SESSION["username"]=$username;
    header("Location: index.php");
  }else{
    echo "Username or Password Incorrect";
  }
 
}

?>  
<script>
    function myFunction(){
        var show = document.getElementById('Show');
        if(show.type == 'password'){
            show.type = 'text';
        }else{
            show.type = 'password';
        }
    }

</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>  
</body>
</html

