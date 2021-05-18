<?php

require './vendor/autoload.php';
//require_once "../database/mailerconfig.php";
require_once "./database/config.php";




//ni_set('memory_limit', '8024M');
 
// Define variables and initialize with empty values
$email = $password  = "";
$email_err = $password_err = "";
$added = "";
$date = date("Y-m-d H:i:s");
 
// Processing form data when form is submitted
if(isset($_POST['addStudent'])){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT * FROM newstudent WHERE Email = :email";
        
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
    
    if(empty(trim($_POST["studentName"]))){
        $password_err = "Please enter a Name.";     
    } else{
        $studentName = trim($_POST["studentName"]);
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

    if(empty(trim($_POST["subject"]))){
        $password_err = "Please enter a address.";     
    } else{
        $subject = trim($_POST["subject"]);
    }


 
   
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO newstudent (idNumber, Name, Contact, Address, Email, password, subject, date) VALUES (:idNumber, :studentName, :contact, :address, :email, :password, :subject, ('$date'))";
         
           if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":idNumber", $param_idNumber, PDO::PARAM_STR);
            $stmt->bindParam(":studentName", $param_studentName, PDO::PARAM_STR);
            $stmt->bindParam(":contact", $param_contact, PDO::PARAM_STR);
            $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":subject", $param_subject, PDO::PARAM_STR);



            // Set parameters
            $param_idNumber = $idNumber;
            $param_studentName = $studentName;
            $param_contact = $contact;
            $param_address = $address;
            $param_email = $email;
            $param_password_email = $password;
            $param_subject = $subject;
            // Creates a password hashcheck
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            //$param_password_verify = password_verify($password, PASSWORD_DEFAULT); 
           




            // Attempt to execute the prepared statement
            if($stmt->execute()){
            

            //variables for email

            $message = " <p><strong>Your login credentials </strong></p> <p>Email: $param_email </p> <p> Password: $param_password_email </p> <p>Best regards,</p> <p>Admin</p>" ;
            $subject1 = "Welcome student $param_studentName! ";
               //send email
            $email = new \SendGrid\Mail\Mail(); 
            $email->setFrom("mrbaslote@gmail.com", "Mael Baslote");
            $email->setSubject($subject1);
            $email->addTo($param_email, $param_studentName);
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
                header("location: teacher.php?action=studentAdded");
            } else{
                header("location: teacher.php?action=error");
            }
                
            //adding table with subject as name
            try{  
                $sql2 = "CREATE TABLE IF NOT EXISTS `$param_subject` AS SELECT Name, email, password FROM newstudent";
                        if ($pdo->query($sql2) === TRUE) {
                            
                                echo "Table MyGuests created successfully";
                            } else {
                                 echo "Error creating table: " . $pdo->error;
                        } 
            }catch (Exception $e) { 
            echo 'Caught exception: '. $e->getMessage() ."\n";
            }

           
               




            // Close statement
            unset($stmt);
        }
    }
    // Close connection
    unset($pdo);
}
?>