<?php
include("connection.php");
$id= $_GET['id'];

$query="DELETE FROM signuptable WHERE id='$id'";
$data=mysqli_query($conn,$query);

if($data){
    echo "Record Deleted Successfully!";
   ?>
<script>
    window.location.href='logout.php';
</script>
   <?php

}

else{
    echo "failed";
}
?>
