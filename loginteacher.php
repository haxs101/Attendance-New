<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinteacher"]) && $_SESSION["loggedinteacher"] === true){
    header("location: teacher.php");
    exit;
}
 
// Include config file
require_once "database/config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT idNumber, Name, Email, password FROM newteacher WHERE Email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if email exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["idNumber"];
                        
                        $name = $row["Name"];
                        $email = $row["Email"];
                        
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedinteacher"] = true;
                            $_SESSION["idNumber"] = $id;
                            $_SESSION["email"] = $email; 
                            $_SESSION["Name"] = $name;
                                                    
                            
                            // Redirect user to welcome page
                            header("location: teacher.php");
                        } else{
                            // Password is idNumbert valid, display a generic error message
                            $login_err = "Invalid email or password. Please try again! ";
                        }
                    }
                } else{
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password. Please try again!";
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=idNumber">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Attendence Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <!-- <link href="css/mdb.css" rel="stylesheet"> -->
    <link href="css/main.css" rel="stylesheet">
    <style rel="stylesheet">
        body {
            background-image: url('http://edusources.in/educampus/img/USICT.jpg');
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
                                <h3> Teacher Email</h3>
                            </div>
                            
                            <!--Error Message-->
                            <?php 
                                    if(!empty($login_err)){
                                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                                    }        
                            ?>
                            <!--Body-->
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="login" method="post">
                                <div class="md-form">
                                    <i class="fa fa-id-card prefix grey-text"></i>
                                    <input id="cyanForm-email" class="form-control" type="text" name="email" required>
                                    <label for="cyanForm-email">Teacher Login</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input id="cyanForm-pass" class="form-control" type="password" name="password" required>
                                    <label for="cyanForm-pass">Your password</label>
                                </div>
                               
                                <div class="text-center">
                                    <button type="submit" name="login" class="btn btn-default waves-effect waves-light">Login</button>
                                    <a href="index.php" class="btn btn-primary waves-effect waves-light">Go Back</a>   
                                </div>
                               
                            </form>                           
                        </div>
                        <!--Footer-->
                        
                    </div>
                    <!--card end-->
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
