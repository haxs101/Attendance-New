<?php

require_once 'studentview.php';

if(isset($_POST["updateProfileProcess"])){
    
    
    $updateName = trim($_POST["updateName"]);
 
    $updateAddress = trim($_POST["updateAddress"]);
    

    $updateContact = trim($_POST["updateContact"]);
    $updateEmail = trim($_POST['updateEmail']);
  
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err)){
        // Prepare an update statement
        $sql = "UPDATE newstudent SET Name=:name, Address=:address, Contact=:contact, Email=:email WHERE idNumber = $_SESSION[idNumber]";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $updateName);
            $stmt->bindParam(":address", $updateAddress);
            $stmt->bindParam(":salary", $updateContact);
            $stmt->bindParam(":email", $updateEmail);
            
            // Set parameters
            $updateName = $name;
            $updateAddress = $address;
            $updateContact = $contact;
            $updateEmail = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: studentview.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }

}

?>