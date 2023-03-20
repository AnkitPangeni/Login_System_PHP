<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="login_style.css">
  </head>
  <body>
    <form action="login.php" method="post" autocomplete="off">
    <div class="form">
        <h2>Login Portal</h2>
        <input type="text" name="username" placeholder="Username or Email" id="username" name="username">
        <input type="password" placeholder="Password" id="password" name="password">
        <button class="btnn" name="button" onclick="return validate()"><a href="#">Login</a></button>

        <p class="link">Don't have an account?<br>
        <a href="signup.php">Sign up </a> here</a></p>
        <p id="success"></p>
       


        </div>
    </form>


        <script>           
function validate() {
    
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
  
    if (
      
      username == "" || password == ""
    ) {
      alert("Please fill all the fields");
      return false;
    } 
    else{
 return true;  
    }
    }


    function loginsuccess()
    {
      var txt ="Login Successful. Redirecting...";
      document.getElementById("success").innerHTML=txt;
     // window.location.href = "display.html";
    }
 
    function loginfailed()
    {



      var failed =document.getElementById("success");
      var txt ="Login failed. Enter valid details!";
      failed.style.color = "red";
      failed.innerHTML=txt;
    }
        </script>
  </body>
</html>


<?php

include("connection.php");
if(isset($_POST['button']))
{

 $username = $_POST['username'];
 $password = $_POST['password'];

 $query= "SELECT * FROM signuptable WHERE (username = '$username' OR email ='$username')  && binary password = '$password' ";
 $data = mysqli_query($conn, $query);
 $result = mysqli_fetch_assoc($data);

 $total = mysqli_num_rows($data);
 //echo $total;

 if($total == 1){

  $_SESSION['username']=$username;
  $_SESSION['password']=$password;
  $_SESSION['id']=$result['id'];


echo $_SESSION['id'];

  ?>
  
  <script>
  loginsuccess();
  </script>
  <meta http-equiv="refresh" content="1; url=display1.php">    
<?php
 //header('location: display.html');   //use this if you want to display the page after login directly from php
 }

 else{

  ?>

<script>
  loginfailed();
  </script> 
<?php

}

}
?>
