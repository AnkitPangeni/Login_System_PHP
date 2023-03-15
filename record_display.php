<html>
<head> 
<title> Table records </title>
<style>

    table,td,th {
        border: 2px solid black;
        border-collapse: collapse;
        padding: 10px;

    }
    </style>

</head>

<body>
<?php

include("connection.php");
error_reporting(0);

$query = "SELECT * FROM signuptable";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);  // to store the number of records in table



if($total!=0) // if there are no records in table

{
    ?>

    <h1 align="center"> Records of the table </h1>
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
   while($result = mysqli_fetch_assoc($data))
   {
    echo"<tr>
<td>".$result[id]." </td>    
<td>".$result[fname]." </td>    
<td>".$result[lname]." </td>  
<td>".$result[username]." </td>  
<td>".$result[email]." </td> 
<td>".$result[password]." </td> 
<td>".$result[age]." </td>    
<td>".$result[gender]." </td>
<td>".$result[number]." </td> 


</tr>
    
    
    ";
   }
}
else {
    echo "no records found";
}
?>
</table>
</body>


</html>

