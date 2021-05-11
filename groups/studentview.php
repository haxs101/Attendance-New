<?php
 
 session_start();

 if(!isset($_SESSION["studentLogin"]) || $_SESSION["studentLogin"] !== true){
    header("location: ../index.php");
    exit;
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
</body>
</html>