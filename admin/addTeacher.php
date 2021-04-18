<?php
require_once('../database/admin_config.php');


$sql = "INSERT INTO newteacher (idNumber, Name, Contact, Address, Email, password) VALUES ('".$_POST['idNumber']."', '".$_POST['teacherName']."', '".$_POST['contact']."', '".$_POST['address']."', '".$_POST['email']."', '".$_POST['password']."')";

if(mysqli_query($db_admin, $sql)){
    echo '<script>alert("Records inserted successfully.")</script>';
    header('Location: adminLogin.php');
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_admin);
}
 
// Close connection
mysqli_close($db_admin);
?>

