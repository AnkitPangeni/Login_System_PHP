<?php

session_start();
if (!isset($_SESSION["username"])) {
    header("location: login.php"); // Redirect the user to the login page if they are not logged in
    exit;
}
else {
  include('connection.php');
  ?>


<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title> Table records </title>
<style>
*{
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

body{
 background-image: url('detailsbg.jpg');
}
    #edit{
        background-color: green;
        font-size: 15px;
        color: white;
        border: 0;
        border-radius: 10px;
        height: 35px;
        width:60px;
        cursor: pointer;
        
      }
      #delete{
        background-color: red;
        font-size: 15px;
        color: white;
        border: 0;
        border-radius: 10px;
        height: 35px;
        width:60px;
        cursor: pointer;
        
      }

      #logout{
        background-color: #FFB612;
        font-size: 15px;
        color: white;
        border: 0;
        border-radius: 10px;
        height: 35px;
        width:60px;
        cursor: pointer;
        
      }

      .container {
  width: 75%;
  max-width: 600px;
  margin: 70px auto;
  background-color: rgba(255, 255, 255, 0.4);
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  border-radius: 15px;
  padding: 20px;
  a
}
.image {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  overflow: hidden;
  margin-bottom: 10px;
  border: 4px solid #3f51b5;
}

.image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.heading {
  font-size: 25px;
  font-weight: bold;
  color: #3f51b5;
  margin-bottom: 20px;
  text-align: center;
}

.user-info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-gap: 10px;
}

.row {
  display: flex;
  align-items: center;
  margin: 8px;
}

.label {
  font-weight: bold;
  color: #333;
  margin-right: 10px;
  flex-basis: 65%;
}

.value {
  color: #777;
  flex-basis: 80%;
}

     
    </style>

</head>

<body>


<?php 

  $username = $_SESSION["username"];
  $query = "SELECT * FROM signuptable WHERE (username = '$username' OR email ='$username')"; // this is because user may enter email or username as username
  $data = mysqli_query($conn,$query);
  $total = mysqli_num_rows($data);  // to store the number of records in table

if($total!=0) 
{
    
    ?>
<body>
    <h1 align="center">
    <?php
      echo "Welcome ". $_SESSION['username'];
          ?> </h1>
   <h2 align="center">  </h2>
  

    <?php
   while($result = mysqli_fetch_assoc($data))   // result vitra sql table ko title harr lekhne
   {
    echo"
<div class='container'>
  <div class='heading'>Your Information</div>
  <center>
  <div class='image'>
  <img src= '".$result['userimg']."' height='200px' width='200px'>
  </div></center>
  <div class='user-info'>
  <div class='row'
  
    <div class='row'>
      <div class='label'>First Name:</div>
      <div class='value'>$result[fname]</div>
    </div>
    <div class='row'>
      <div class='label'>Last Name:</div>
      <div class='value'>$result[lname]</div>
    </div>
    <div class='row'>
      <div class='label'>Username:</div>
      <div class='value'>$result[username]</div>
    </div>
    <div class='row'>
      <div class='label'>Email:</div>
      <div class='value'>$result[email]</div>
    </div>
    <div class='row'>
      <div class='label'>Password:</div>
      <div class='value'>$result[password]</div>
    </div>
    <div class='row'>
      <div class='label'>Age:</div>
      <div class='value'>$result[age]</div>
    </div>
    <div class='row'>
      <div class='label'>Gender:</div>
      <div class='value'>$result[gender]</div>
    </div>
    <div class='row'>
      <div class='label'>Number:</div>
      <div class='value'>$result[number]</div>
    </div>
  </div>
</div>

";

    echo "<center>
    <a href='edit.php?id=$result[id]'> <input type='submit' value='Edit' id='edit'></a>
    <a href='delete.php?id=$result[id]'> <input type='submit' value='Delete' id='delete' onclick='return confirmdelete()'></a>
    <a href='logout.php'> <input type='submit' value='Logout' id='logout' onclick='return confirmlogout()'></a>
    </center>";
   }
}
else {
    echo "no records found";
}
}
?>


<script>
function confirmdelete()
{
  return confirm('Are you sure you want to delete your record ?');  
}

function confirmlogout()
{
  return confirm('Are you sure you want to logout?');  
}


</script>

</body>


</html>

