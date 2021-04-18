<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin/adminLogin.php");
    exit;
}
 
// Include config file
require_once "database/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT No, username, password FROM admin WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["No"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["No"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: admin/adminLogin.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password. Please try again! ";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password. Please try again!";
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
                                <h3>Login</h3>
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
                                    <input id="cyanForm-email" class="form-control" type="text" name="username" required>
                                    <label for="cyanForm-email">Admin Login</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input id="cyanForm-pass" class="form-control" type="password" name="password" required>
                                    <label for="cyanForm-pass">Your password</label>
                                </div>
                               
                                <div class="text-center">
                                    <button type="submit" name="login" class="btn btn-default waves-effect waves-light">Login</button>
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
