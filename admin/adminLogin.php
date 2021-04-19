<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../adminLogin.php");
    exit;
}

require '../vendor/autoload.php';
//require_once "../database/mailerconfig.php";
require_once "../database/config.php";
 
// Define variables and initialize with empty values
$email = $password  = "";
$email_err = $password_err = "";
$added = "";
 
// Processing form data when form is submitted
if(isset($_POST['addTeacher'])){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT * FROM newteacher WHERE Email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "This username is already taken.";
                    header("location: adminLogin.php?action=error");
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                header("location: adminLogin.php?action=error");
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["teacherName"]))){
        $password_err = "Please enter a Name.";     
    } else{
        $teacherName = trim($_POST["teacherName"]);
    }
   
    if(empty(trim($_POST["idNumber"]))){
        $password_err = "Please enter a ID Number.";     
    } else{
        $idNumber = trim($_POST["idNumber"]);
    }
   
    if(empty(trim($_POST["contact"]))){
        $password_err = "Please enter a contact.";     
    } else{
        $contact = trim($_POST["contact"]);
    }
   
    if(empty(trim($_POST["address"]))){
        $password_err = "Please enter a address.";     
    } else{
        $address = trim($_POST["address"]);
    }
   
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO newteacher (idNumber, Name, Contact, Address, Email, password) VALUES (:idNumber, :teacherName, :contact, :address, :email, :password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":idNumber", $param_idNumber, PDO::PARAM_STR);
            $stmt->bindParam(":teacherName", $param_teacherName, PDO::PARAM_STR);
            $stmt->bindParam(":contact", $param_contact, PDO::PARAM_STR);
            $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_idNumber = $idNumber;
            $param_teacherName = $teacherName;
            $param_contact = $contact;
            $param_address = $address;
            $param_email = $email;
            $param_password_email = $password;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            //$param_password_verify = password_verify($password, PASSWORD_DEFAULT); 
           
            // Attempt to execute the prepared statement
            if($stmt->execute()){
            

            //variables for email

            $message = " <p><strong>Your login credentials </strong></p> <p>Email: $param_email </p> <p> Password: $param_password_email </p> <p>Best regards,</p> <p>Admin</p>" ;
            $subject = "Welcome $param_teacherName! ";
               //send email
            $email = new \SendGrid\Mail\Mail(); 
            $email->setFrom("mrbaslote@gmail.com", "Mael Baslote");
            $email->setSubject($subject);
            $email->addTo($param_email, $param_teacherName);
            $email->addContent("text/plain", $message);
            $email->addContent(
                "text/html", $message);
            $sendgrid = new \SendGrid('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');
            try {
                $response = $sendgrid->send($email);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
            } catch (Exception $e) {
                echo 'Caught exception: '. $e->getMessage() ."\n";
            }
                
                // Redirect to login page
                echo $added = "ADDED";
                header("location: adminLogin.php?action=teacherAdded");
            } else{
                header("location: adminLogin.php?action=error");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="app.js"></script>
    <title>Admin Page</title>
</head>
<body>
<div class="container"  style="padding-top: 20px">
<?php
if(isset($_GET['action']) && $_GET['action'] == 'teacherAdded'){
					echo "<h4 class='alert alert-success'>Teacher added successfully!</h4>";
				}
				?>
                <?php
if(isset($_GET['action']) && $_GET['action'] == 'error'){
					echo "<h5 class='alert alert-danger'>Seems there is an error. Please try again!</h5>";
				}
				?>
<h1>Hello <?php echo htmlspecialchars($_SESSION["username"]); ?> </h1>
    <div class="row align-items-center">
        <div class="card">
            <div class="card-body">
                <button id="newTeacher" onclick="addTeacher()">New Teacher</button><br><br>
                <button id="newStudent" onclick="addStudent()">New Student</button><br><br>
                <button id="showTeacher" onclick="viewTeacher()">View Teacher</button><br><br>
                <button id="attendance" onclick="viewAttendance()">Attendance</button><br><br>
                <button><a href="../logout.php">Logout</a></button><br><br>
            </div>
        </div>
   
        <div class="col-8" id="addTeacher"  style="display:none; padding-left:60px;">
            
               
        <div class="wrapper">
        <h2 style="text-align:center">New Teacher</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group">
                <label>Teacher Name</label>
                <span class="invalid-feedback"><?php echo $added; ?></span> 
                <input type="text" name="teacherName" class="form-control" required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group">
                <label>ID Number</label>
                <input type="text" name="idNumber" class="form-control" required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>


          <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" required>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>


              
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            
            <div class="form-group">
                <input type="submit" name="addTeacher" class="btn btn-primary" value="Submit">
                
            </div>
            
        </form>
    </div>    
               
             
      </div>


    <div class="col-8" id="addStudent" style="display:none;" >
        <h1>Add a Student</h1>
         Name: <input type="text"> <br>
         ID #: <input type="text"><br>
         Address:  <input type="text"><br>
         Contact: <input type="text"><br>
                 <input type="submit">
     </div>
   
 

    <div class="col-8" id="viewTeacher" style="display:none;" >
         <h1>View Teacher</h1>
           Name: <input type="text"> <br>
            ID #: <input type="text"><br>
             Address:  <input type="text"><br>
              Contact: <input type="text"><br>
                <input type="submit">
     </div>
   


    <div class="col-8" id="viewAttendance" style="display:none;" >
        <h1>Attendace</h1>
          Name: <input type="text"> <br>
          ID #: <input type="text"><br>
            Address:  <input type="text"><br>
                 Contact: <input type="text"><br>
                 <input type="submit">
     </div>
   
 
</div>


</body>
</html>
