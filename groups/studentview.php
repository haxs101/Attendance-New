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
    $sql = "UPDATE newstudent SET date=('$date') WHERE idNumber = ($_SESSION[idNumber]) ";
    $insertdate = $pdo->prepare($sql);
    $insertdate->execute();

    try{
        $sql2 = "INSERT INTO student_attendance_record (idNumber, attendance, Name, subject ) SELECT idNumber, date, Name, subject FROM newstudent WHERE idNumber = ($_SESSION[idNumber])";
        $a = $pdo->prepare($sql2);
        $a->execute();

        header("Location: studentview.php?action=added");


        }catch (Exception $e) { 
        echo 'Caught exception: '. $e->getMessage() ."\n";
        }

        
    
}

try {
    $sql3 = "SELECT subject FROM newstudent WHERE idNumber = ($_SESSION[idNumber])";

    $q = $pdo->query($sql3);

    $q->setFetchMode(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    die("Could not connect to the database :" . $e->getMessage());
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>






<div class="container">


    <h1>Hello Student <?php echo htmlspecialchars(ucwords($_SESSION["Name"])) ; ?>!  <a href="../logout.php" class="btn btn-danger">logout</a></h1>
    

    

        <h1> Your Subjects!</h1>
<!-- Alert success adding -->
        <?php
            if(isset($_GET['action']) && $_GET['action'] == 'added'){
                        echo "<h4 class='alert alert-success'>Your attendance has been recorded!</h4>";
                    }
        ?>


        <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><?php while ($row = $q->fetch()): ?>
                <h3><?php echo htmlspecialchars(strtoupper($row['subject']) )?></h3>
        <?php endwhile; ?></button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
             <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check in!</h4>
                </div>
                <div class="modal-body">
                <form method="post">
                    <p>Click the button below to take attendance!</p>

                    

                        <input type="submit" name="checkin" class="btn btn-primary">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </div>

            </div>
        </div>
        
</div>


</body>

</html>