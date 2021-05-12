<?php
 
 session_start();
require '../database/config.php';


 if(!isset($_SESSION["studentLogin"]) || $_SESSION["studentLogin"] !== true){
    header("location: ../index.php");
    exit;
}


if(isset($_POST['checkin'])){
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $sql = "UPDATE newstudent SET date=('$date')";
    $insertdate = $pdo->prepare($sql);
    $insertdate->execute();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Hello Student <?php echo htmlspecialchars(ucwords($_SESSION["Name"])) ; ?>! </h1>
<a href="../logout.php">logout</a>

<form method="post">

<input type="submit" name="checkin">
</form>
</body>
</html>