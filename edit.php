<?php 
$id= $_GET['id'];

session_start();

if (!isset($_SESSION["username"])) {
    header("location: login.php"); // Redirect the user to the login page if they are not logged in
    exit;
}



else if($_SESSION["id"]!=$id){
 echo "Error 404" ;
}


else {
    ?>




<?php 
include("connection.php");
$id=$_GET['id'];
$query = "SELECT * FROM signuptable WHERE id='$id' ";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit details</title>
   <link rel="stylesheet" href="signup_style.css">
<script src="signup_script.js"></script>
  </head>

  <body>
  <!--  <form  action="#" method="POST" autocomplete="off"  enctype="multipart/form-data"> -->
    <form  action="#" method="POST" autocomplete="off"  enctype="multipart/form-data">

      
        <h2>Edit Your Details</h2>
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

      First name <input type="text" value="<?php echo $result['fname']; ?>" id="fname" name="fname"/> <br>

      Last name <input type="text" value="<?php echo $result['lname']; ?>" id="lname" name="lname" /><br />
      Username <input type="text" onclick="disabledfield()" id="username" name="username" value="<?php echo $result['username']; ?>" readonly /><br />
      Email <input type="text" id="email" name="email" value="<?php echo $result['email']; ?>" readonly onclick="disabledfield()"/><br />
      Password <input type="password" value="<?php echo $result['password']; ?>" id="password" name="password" />  
      <br />
      Age<input type="number" value="<?php echo $result['age']; ?>" id="age" name="age" />  <br /> 
      
       Gender:
       <input type="radio"  name="gender" id="male" value="male"
       <?php  if($result['gender']=='male') {echo "checked";}?>
       />Male
      <input type="radio" name="gender" id="female" value="female" 
      <?php  if($result['gender']=='female') {echo "checked";}?>
      />Female
      <input type="radio" name="gender" id="others" value="others"
      <?php  if($result['gender']=='others') {echo "checked";}?>

      />Others <br />



<br>
      Phone number<input type="text" value="<?php echo $result['number']; ?>" id="number" name="number" />  <br />
      
      <!--Image <input type="file" value="<?php echo $result['userimg']; ?>" name="uploadfile" > <br> <br> -->

     

      <input type= "submit" value="Update" onclick="return validate()" name="update">
      <input type= "reset">

      
    </form>
    

    <script> 
    
    function disabledfield(){
    alert("You cannot edit your username or email.");
  }

</script>
  </body>
</html>










<?php


if(isset($_POST['update']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $age  = $_POST['age'];
  $gender = $_POST['gender'];
  $number = $_POST['number'];

$filename =$_FILES["uploadfile"]["name"];
$tempname =$_FILES["uploadfile"]["tmp_name"];
$folder = "userimages/".$filename;
//echo $folder;

move_uploaded_file($tempname,$folder);
    

 // $query = "UPDATE signuptable SET fname='$fname',lname='$lname',username='$username',email='$email',password='$password',age='$age',gender='$gender',number='$number',userimg='$folder'
 // WHERE id='$id'";
 $query = "UPDATE signuptable SET fname='$fname',lname='$lname',username='$username',email='$email',password='$password',age='$age',gender='$gender',number='$number'
 WHERE id='$id'";
  
  $data = mysqli_query($conn,$query);

  if($data)
  {
   ?>

   <script>
    window.location.href='display1.php';
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
