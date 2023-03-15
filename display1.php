<html>
<head> 
<title> Table records </title>
<style>

    table,td,th {
        border: 2px solid black;
        border-collapse: collapse;
        padding: 10px;
        text-align: center;

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
        
      input:hover{

        background-color:darkslategray;
      }
    </style>

</head>

<body>


<?php 

session_start();
if (!isset($_SESSION["username"])) {
    header("location: login.php"); // Redirect the user to the login page if they are not logged in
    exit;
}
else {

  include('connection.php');
  $username = $_SESSION["username"];
  $query = "SELECT * FROM signuptable WHERE (username = '$username' OR email ='$username')"; // this is because user may enter email or username as username
  $data = mysqli_query($conn,$query);
  $total = mysqli_num_rows($data);  // to store the number of records in table

if($total!=0) 
{
    
    ?>

    <h1 align="center">
    <?php
      echo "Welcome ". $_SESSION['username']." !";
          ?> </h1>
   <h2 align="center"> Your Records </h2>
<table align="center" width="90%">
    <tr>
<th> ID </th>    
<th> First Name </th>    
<th> Last Name </th>  
<th> UserName </th>  
<th> Email </th> 
<th> Password </th> 
<th> Age </th>    
<th> Gender </th>
<th>Phone </th> 

</tr>   

    <?php
   while($result = mysqli_fetch_assoc($data))   // result vitra sql table ko title harr lekhne
   {
    echo"<tr>
<td>".$result['id']." </td>     
<td>".$result['fname']." </td>    
<td>".$result['lname']." </td>  
<td>".$result['username']." </td>  
<td>".$result['email']." </td> 
<td>".$result['password']." </td> 
<td>".$result['age']." </td>    
<td>".$result['gender']." </td>
<td>".$result['number']." </td> 


</tr>
</table>"

;

    echo "<br><center>
    <a href='edit.php?id=$result[id]'> <input type='submit' value='Edit' id='edit'></a>
    <a href='delete.php?id=$result[id]'> <input type='submit' value='Delete' id='delete'></a>
    <a href='logout.php'> <input type='submit' value='logout' id='logout'></a>
    </center>";
   }
}
else {
    echo "no records found";
}
}
?>


</body>


</html>

