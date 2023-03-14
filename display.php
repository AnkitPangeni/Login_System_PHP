<?php 

session_start();
if (!isset($_SESSION["username"])) {
    header("location: login.php"); // Redirect the user to the login page if they are not logged in
    exit;
}
else {
  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Successful</title>


    <style>

      input{
        background-color: black;
        font-size: 15px;
        color: white;
        border: 0;
        border-radius: 10px;
        height: 35px;
        width:60px;
        cursor: pointer;
      }
        
      input:hover{

        background-color:darkslategray;
      }
      
    </style>
  </head>
  <body>
    <center>
      <img src="hari.jfif" alt="" /> <br>
      <?php
      echo "Welcome ". $_SESSION['username'].".";
          ?>
      <p>Thank you for logging in</p>

     <a href="logout.php"> <input type="submit" value="logout"></a>
    </center>
  </body>
</html>
<?php
}
