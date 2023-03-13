<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup Form</title>
   <link rel="stylesheet" href="signup_style.css">
<script src="signup_script.js"></script>
  </head>

  <body>
    <form  action="#" method="POST" autocomplete="off">
      
        <h2>Sign up Portal</h2>
      <p>
        Note:
    <ul>
     <li>Name shouldn't contain any number or symbol </li>
      <li> Username length should be at least 4 </li>
      <li>Age should be between 8 & 60 </li>
      <li>Phone number must be of 10 digits </li>
      <li> Password length should be at least 6, should start with a letter and end with a digit </li> 
      
        
    </ul>
    </p> 
    
    <p id="error" style="color:yellow; text-align:center"></p>

      First name <input type="text" id="fname" name="fname"/> <br>

      Last name <input type="text" id="lname" name="lname" /><br />
      Username <input type="text" id="username" name="username" /><br />
      Email <input type="text" id="email" name="email"/><br />
      Password <input type="password" id="password" name="password" />  
      <br />
      Age<input type="number" id="age" name="age" />  <br /> 
      
       Gender:<input type="radio" name="gender" id="male" value="male"  />Male
      <input type="radio" name="gender" id="female" value="female" />Female
      <input type="radio" name="gender" id="others" value="others" />Others <br />



<br>
      Phone number<input type="text" id="number" name="number" />  <br />
      

     

      <input type= "submit" value="Register" onclick="return validate()" name="register">
      <input type= "reset">

      
    </form>
    

    
  </body>
</html>



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


  $checkuser = "SELECT * from signuptable WHERE username = '$username' OR email ='$email' ";
    $data = mysqli_query($conn,$checkuser);
    $total = mysqli_num_rows($data);
    if($total>0){

      ?>
      
      <script>
        var txt= "Username or Email already used";
        document.getElementById("error").innerHTML=txt;
      </script>
      
      <?php
    }
    else {

  $query = "INSERT INTO signuptable (fname,lname,username,email,password,age,gender,number) VALUES('$fname','$lname','$username','$email','$password','$age','$gender','$number')";
  $data = mysqli_query($conn,$query);

  if($data)
  {
   ?>

   <script>
    window.location.href='signup_success.html';
   </script>
   <?php

 //  header('location: signup_success.html');

   
  }
  else {

?>
<script>
  alert("Something is wrong. Please try again later");
</script>
<?php


  }
  
}
}


?>