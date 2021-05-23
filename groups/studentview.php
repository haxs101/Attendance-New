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
        $sql2 = "INSERT INTO student_attendance_record (id, idNumber, attendance, Name, subject, teacher ) SELECT id, idNumber, date, Name, subject, teacher FROM newstudent WHERE idNumber = ($_SESSION[idNumber])";
        $a = $pdo->prepare($sql2);
        $a->execute();

        header("Location: studentview.php?action=added");


        }catch (Exception $e) { 
        echo 'Caught exception: '. $e->getMessage() ."\n";
        }

// /~2-EBKQ][ha&Ry9V       
    
}

try {
    $sql3 = "SELECT subject FROM newstudent WHERE idNumber = ($_SESSION[idNumber])";

    $q = $pdo->query($sql3);

    $q->setFetchMode(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    die("Could not connect to the database :" . $e->getMessage());
}

//Profile Update script

if(isset($_POST["updateProfileProcess"])){
    
    
    $updateName = trim($_POST["updateName"]);
 
    $updateAddress = trim($_POST["updateAddress"]);
    

    $updateContact = $_POST["updateContact"];
    $updateEmail = trim($_POST['updateEmail']);
  
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err)){
        // Prepare an update statement
        $sql = "UPDATE newstudent SET Name=:name, Address=:address, Contact=:contact, Email=:email WHERE idNumber = $_SESSION[idNumber]";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":address", $param_address);
            $stmt->bindParam(":contact", $param_contact);
            $stmt->bindParam(":email", $paramEmail);
            
            // Set parameters
            $param_name = $updateName;
            $param_address = $updateAddress;
            $param_contact = $updateContact;
            $paramEmail = $updateEmail;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){

                try{
                    $sql2b = "UPDATE student_attendance_record SET Name= '$param_name' WHERE idNumber = $_SESSION[idNumber]";
                    $pdo->query($sql2b);
                    }catch (Exception $e) { 
                echo 'Caught exception: '. $e->getMessage() ."\n";
                }

                try{
                    $sql2b1 = "UPDATE teacher_subjects SET Name= '$param_name' WHERE idNumber = $_SESSION[idNumber]";
                    $pdo->query($sql2b1);
                    }catch (Exception $e) { 
                echo 'Caught exception: '. $e->getMessage() ."\n";
                }

                // Records updated successfully. Redirect to landing page
                echo "<script>alert('Update success! Please login again!')</script>";
                echo "<script>window.location.href='../logout.php'</script>";
                exit();
        }   

             //update other table

             //09512399818  

            
                    
        // Close statement
        unset($stmt);
    }

   unset($pdo);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="app.js"></script>
    <title>Student <?php echo htmlspecialchars(ucwords($_SESSION["Name"])); ?>!</title>

   <style>
       
   .subjects1{
        text-decoration:underline;
   }
   body {
            background-image:  linear-gradient(to left, #ccffdd, #ffffcc )
        } 
   
    </style>
</head>
<body>






<div class="container" style="padding-top: 50px">
  <!-- Alert success adding -->
  <?php
            if(isset($_GET['action']) && $_GET['action'] == 'added'){
                        echo "<h4 class='alert alert-success'>Your attendance has been recorded!</h4>";
                    }
        ?>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd; padding-bottom: 20px">
        <a class="navbar-brand" href="studentview.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

            <li class="nav-item">
            <a class="nav-link" href="#"  onclick="updateProfile()">Update Profile</a>
        </li>
            

            <li class="nav-item">
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </li>
        <li class="nav-item"></li>
            </ul>
        
        </div>
    </nav>


    <div class="jumbotron" id="homee">
            <h1 class="display-4">Hello Student <?php echo htmlspecialchars(ucwords($_SESSION["Name"])); ?>!! </h1>
            <p class="lead">This is the homepage for students! Take your attendance here!</p>
            <hr class="my-4">
            
        <h2 class="subjects1"> Your Subjects!</h2>
            <p class="lead">
                   <!-- Trigger the modal with a button -->
             <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal"><?php while ($row = $q->fetch()): ?>
                <h3><?php echo htmlspecialchars(ucwords($row['subject']) )?></h3>
                    <?php endwhile; ?>
            </button>
            </p>
    </div>



   
    

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
             <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Check in!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
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



        <div class="col" id="updateProfile" style="display:none;" >
            <h1 style="text-align:center">Update Profile</h1>
                <form method="post">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="updateName" class="form-control" required>
                    </div>

                  

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="updateAddress" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="updateContact" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="updateEmail" class="form-control" required>
                   </div>

                    <div class="form-group">
                        <input type="submit" name="updateProfileProcess" class="btn btn-primary" value="Submit">
                        
                    </div>

                    </form>
         </div>
        
</div>

<?php

include '../footer.php';
?>
</body>

</html>