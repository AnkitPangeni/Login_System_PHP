<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup Successful</title>



   <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        text-align: center;
      }
      
      h1 {
        color: #3f51b5;
        font-size: 3em;
        margin-top: 2em;
      }
      
      p {
        font-size: 1.2em;
        line-height: 1.5;
        margin: 1em 0;
      }
    </style>

  </head>

  <body>




<?php 
include("connection.php");
if(isset($_POST['register']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $age  = $_POST['age'];
  $gender = $_POST['gender'];
  $number = $_POST['number'];

  $query = "INSERT INTO signuptable (fname,lname,username,email,password,age,gender,number) VALUES('$fname','$lname','$username','$email','$password','$age','$gender','$number')";
  $data = mysqli_query($conn,$query);

  if($data)
  {
   
   ?>

<h1>Signup Successful!</h1>
    <p>Thank you for signing up!</p>
    <p><a href="login.php">Click here</a> to login into your account.</p>


    <?php
   
  }
  else {
    echo "Failed";
  }
}

?>


  </body>
</html>