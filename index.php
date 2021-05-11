<?php
session_start();
require_once "database/config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['studentLogin'])){
 
    // Check if email is empty
                if(empty(trim($_POST["idNumber"]))){
                    $email_err = "Please enter ID Number.";
                } else{
                    $idnumber = trim($_POST["idNumber"]);
                }
                
                // Check if password is empt
                
                // Validate credentials
                if(empty($email_err)){
                    // Prepare a select statement
                    $sql = "SELECT idNumber, Name FROM newstudent WHERE idNumber = :idNumber";
                    
                    if($stmt = $pdo->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bindParam(":idNumber", $param_idNumber, PDO::PARAM_STR);
                        
                        // Set parameters
                        $param_idNumber = trim($_POST["idNumber"]);
                        
                        // Attempt to execute the prepared statement
                        if($stmt->execute()){
                            // Check if email exists, if yes then verify password
                            if($stmt->rowCount() == 1){
                                if($row = $stmt->fetch()){
                                    $id = $row["idNumber"];
                                    
                                    $name = $row["Name"];
                                        // Password is correct, so start a new session
                                        session_start();
                                        
                                        // Store data in session variables
                                        $_SESSION["studentLogin"] = true;
                                        $_SESSION["idNumber"] = $id;
                                        
                                        $_SESSION["Name"] = $name;
                                                                
                                        
                                        // Redirect user to welcome page
                                        header("location: groups/studentview.php");
                                    } else{
                                        // Password is idNumbert valid, display a generic error message
                                        $login_err = "Invalid email or password. Please try again! ";
                                    }
                                }
                             else{
                                // email doesn't exist, display a generic error message
                                $login_err = "No record found. Please try again!";
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        // Close statement
                        unset($stmt);
                    }
                
            }
                // Close connection
                unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Attendence Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <!-- <link href="css/mdb.css" rel="stylesheet"> -->
    <link href="css/main.css" rel="stylesheet">
    <style rel="stylesheet">
        body {
            background-image: url('./icons/1.jpg');
        } 
        main {
            padding-top: 4rem;
            padding-bottom: 2rem;
        }
    </style>
</head>

<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6 mb-r">    
                    <!--Form without header-->
                    <div class="card">
                        <div class="card-body">
                            <!--Header-->
                            <div class="form-header default-color text-center">
                                <h3>Student Login</h3>
                            </div>
                            <?php 
                                    if(!empty($login_err)){
                                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                                    }        
                            ?>
                            <!--Body-->
                            <form action="" name="login" method="post">
                                <div class="md-form">
                                    <i class="fa fa-id-card prefix grey-text"></i>
                                    <input id="cyanForm-email" class="form-control" type="text" name="idNumber" required>
                                    <label for="cyanForm-email">Enrollment Number</label>
                                </div>
                               
                                <?php                         
                                    if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                                    echo "<script>alert('Enrollment no or Password do not match');</script>";
                                    unset($_SESSION['ERRMSG_ARR']);
                                    }
                                ?>
                                <div class="text-center">
                                    <button type="submit" name="studentLogin" class="btn btn-default waves-effect waves-light">Student Login</button>
                                    <a href="loginteacher.php" class="btn btn-deep-orange waves-effect waves-light">Teacher Login</a> 
                                    <a href="admin.php" class="btn btn-primary waves-effect waves-light">Admin Login</a>    
                                </div>
                            </form>                           
                        </div>
                        <!--Footer-->
                        
                    </div><!--card-->
                    <!--/Form without header-->           
                </div><!--col-->
            </div><!--row-->
        </div>
    </main>

    <!--Footer-->
    <!--/.Footer-->

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>

</body>

</html>
