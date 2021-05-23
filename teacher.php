<?php
// Initialize the session
session_start();

require 'addstudent.php';
require 'viewAttendanceConfig.php';
require 'viewTeacherSubjectHandled.php';
require 'viewStudentSubjectEnrolled.php';
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinteacher"]) || $_SESSION["loggedinteacher"] !== true){
    header("location: teacher.php");
    exit;
}

if(isset($_POST['timein'])){
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $sql = "UPDATE newteacher SET attendance=('$date') WHERE idNumber = ($_SESSION[idNumber]) ";
    $insertdate = $pdo->prepare($sql);
    $insertdate->execute();

    try{
        $sql2 = "INSERT INTO teacher_attendance_record (idNumber, Name, attendance, Email ) SELECT idNumber, Name, attendance, Email FROM newteacher WHERE idNumber = ($_SESSION[idNumber])";
        $a = $pdo->prepare($sql2);
        $a->execute();

        header("Location: teacher.php?action=attendanceAdded");


        }catch (Exception $e) { 
        echo 'Caught exception: '. $e->getMessage() ."\n";
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
<style>
 body {
            background-image: linear-gradient(to left, #e6ffcc, #ffe6b3 );
        } 
</style>

        <title>Teacher Page</title>
       
    </head>
    <body>
    <div class="container"  style="padding-top: 20px">
    <?php
    if(isset($_GET['action']) && $_GET['action'] == 'studentAdded'){
                        echo "<h4 class='alert alert-success'>Student added successfully!</h4>";
                    }

?>

<?php
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                        echo "<h4 class='alert alert-danger'>Student deleted successfully!</h4>";
                    }
                    ?>

    <?php
     if(isset($_GET['action']) && $_GET['action'] == 'attendanceAdded'){
        echo "<h4 class='alert alert-success'>Your attendance has been recorded!</h4>";
    }
    ?>

<?php
     if(isset($_GET['action']) && $_GET['action'] == 'deleteAttendance'){
        echo "<h4 class='alert alert-danger'>Attendance deleted!</h4>";
    }
    ?>
    


                    
                    <?php
    if(isset($_GET['action']) && $_GET['action'] == 'error'){
                        echo "<h5 class='alert alert-danger'>Seems there is an error. Please try again!</h5>";
                    }
                    ?>

<?php
    if(isset($_GET['action']) && $_GET['action'] == 'errorTaken'){
                        echo "<h5 class='alert alert-warning'>Seems there is an error. Please try again!</h5>";
                    }
                    ?>

    

    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="teacher.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#" id="newStudent1" onclick="addStudent()">New Student <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="showStudent1" onclick="viewStudent()">View Student Attendance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="takeAttendance1" onclick="teacherAttendance()">Teacher Attendance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="subjectHandle1" onclick="subjectHandled()">Subject Handled</a>
        </li>
     
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
        </ul>
    </div>
    </nav>
    <div class="jumbotron" id="homee">
        <h1 class="display-4">Hello Teacher <?php echo htmlspecialchars(ucwords($_SESSION["Name"])) ; ?>! </h1>
        <p class="lead">This is the homepage for teachers! You can add, view students from the nav bar.</p>
       
    </div>
        <div class="row">
        
    
            <div class="col" id="addStudent"  style="display:none; padding-left:60px;">
                
                
            <div class="wrapper">
                <h2 style="text-align:center">New Student</h2>
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">
                        <label>Student Name</label>
                        <span class="invalid-feedback"><?php echo $added; ?></span> 
                        <input type="text" name="studentName" class="form-control" required>
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label>ID Number</label>
                        <input type="text" name="idNumber" class="form-control" required>
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" required>
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
                            <small id="passwordHelpInline" class="text-muted">
                                    Credentials will be sent to this email address.
                            </small>
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>


                    
                  
                    
                    <div class="form-group">
                        <input type="submit" name="addStudent" class="btn btn-primary" value="Submit">
                        
                    </div>
                    
                </form>
            </div>    
                    
                    
            </div>


            <div class="col" id="teacherAttendance" style="display:none;" >
                    <h1 style="text-align:center">Take attendance</h1>

                  
                    <div class="col-md-12 text-center" style="padding-top: 30px">
                        <button type="button" class="btn btn-info  btn-block btn-md" data-toggle="modal" data-target="#myModal" style="">
                            <h3 style="text-align:center">Time in</h3>
                        </button>
                    </div>

                    <!-- Modal start-->
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

                                

                                    <input type="submit" name="timein" class="btn btn-primary">
                                </form>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- End Modal content-->

            </div>
        </div>
            </div>
        
        

            <div class="col" id="viewStudent" style="display:none;" >
                <h1 style="text-align:center">View Student Attendance</h1>
                <p style="text-align:center; font-style:italic"> Note: Student's who did not submit attendance will not display here.</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        
                        <th scope="col">Attendance</th>
                        
                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars(ucwords($row['Name'])) ?></th>
                            <td><?php echo htmlspecialchars(ucwords($row['subject'])) ?></td>
                            <td><?php echo htmlspecialchars($row['attendance']) ?></td>
                            <td><a onclick="javascript:confirmationDelete($(this));return false;"  href="deleteStudentAttendance.php?id=<?php echo $row['id']; ?>"><img src="icons/delete.svg" alt="Delete Teacher"></a></td>

                        </tr>
                        <?php endwhile; ?>
                        
                    </tbody>
                </table>
            </div>
        
            <div class="col" id="subjectHandled" style="display:none;" >
            <h1 style="text-align:center">Subjects Handled</h1>
                <table class="table table-striped">
                  
                    <tbody>
                    <?php while ($row = $q2->fetch()): ?>
                        <tr>
                            <th scope="row">
                                <button type="button" onclick="myViewStudent()" class="btn btn-outline-info btn-block btn-md">
                                <h5> <?php echo htmlspecialchars(ucwords($row['subject'])) ?></h5>
                                </button>
                       
                            </th>
                        </tr>
                        <?php endwhile; ?>
                        
                    </tbody>
                </table>
            </div>




            <div class="col" id="myViewStudent" style="display:none;" >
                <h3 style="text-align:center">Enrolled Student</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        
                        
                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $q3->fetch()): ?>
                        <tr>
                            <th scope="row">
                            <ul>
                                <li>
                                    <?php echo htmlspecialchars($row['Name']) ?>
                                </li>
                            </ul>
                            </th>
                            <th scope="row"><?php echo htmlspecialchars($row['subject']) ?></th>
                            <td><a onclick="javascript:confirmationDelete($(this));return false;"  href="deleteStudent.php?id=<?php echo $row['id']; ?>"><img src="icons/delete.svg" alt="Delete Teacher"></a></td>
                        </tr>
                        <?php endwhile; ?>
                        
                    </tbody>
                </table>
            </div>
                
                     
    
    </div>

   <?php

   include 'footer.php';
   ?>
    </body>
    </html>
