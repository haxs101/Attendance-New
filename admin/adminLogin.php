<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../adminLogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <title>Admin Page</title>
</head>
<body>
<div class="container"  style="padding-top: 20px">

<h1>Hello <?php echo htmlspecialchars($_SESSION["username"]); ?> </h1>
    <div class="row align-items-center">
    <div class="card">
                        <div class="card-body">
      
        <button id="newTeacher">New Teacher</button><br><br>
        <button id="newStudent">New Student</button><br><br>
        <button id="showTeacher">View Teacher</button><br><br>
        <button id="attendance">Attendance</button><br><br>
        <button><a href="../logout.php">Logout</a></button><br><br>
</div>
</div>
   

    <div class="col-8" id="addTeacher" style="display:none;" >
        <h1>Add a Teacher</h1>
        <form action="addTeacher.php" method="POST">
        
                Name: <input type="text" class="form-control" name="teacherName"> <br>
                ID #: <input type="text" class="form-control" name="idNumber"><br>
                Address:  <input type="text" class="form-control" name="address"><br>
                Contact: <input type="text" class="form-control" name="contact"><br>
                Email: <input type="text" class="form-control" name="email"><br>
                Password: <input type="password" class="form-control" name="password"><br>
                            <input type="submit" class="btn btn-primary mx-auto d-block" >
            </form>
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

<script src="app.js"></script>
</body>
</html>
