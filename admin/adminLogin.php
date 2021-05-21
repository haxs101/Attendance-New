    <?php
    // Initialize the session
    session_start();
    
    require 'newTeacherProcess.php';
    require 'viewTeacherProcess.php';
    require 'adminViewAttendance.php';
    
   
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         
        <script src="app.js"></script>
        <title>Admin Page</title>
       <style>
        body {
            background-image: linear-gradient(to right,#e6ffcc,#cce6ff );
        } 
       </style>
        
    </head>
    <body>
    <div class="container"  style="padding-top: 20px">
    <?php
    if(isset($_GET['action']) && $_GET['action'] == 'teacherAdded'){
                        echo "<h4 class='alert alert-success'>Teacher added successfully!</h4>";
                    }
                    ?>

    <?php
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                        echo "<h4 class='alert alert-danger'>Teacher deleted successfully!</h4>";
                    }
                    ?>
                    
                    <?php
    if(isset($_GET['action']) && $_GET['action'] == 'error'){
                        echo "<h5 class='alert alert-danger'>Seems there is an error. Please try again!</h5>";
                    }
                    ?>
                     <?php
    if(isset($_GET['action']) && $_GET['action'] == 'errorPassword'){
                        echo "<h5 class='alert alert-danger'>Seems there is an error. Please try again!</h5>";
                    }
                    ?>
    

    <nav class="navbar navbar-light navbar-expand-lg justify-content-between" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="adminLogin.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="padding-right:330px">
                <li class="nav-item active">
                    <a class="nav-link" href="#" id="newTeacher" onclick="addTeacher()">New Teacher <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="showTeacher" onclick="viewTeacher()">View Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="attendance" onclick="viewAttendance()">Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
                </ul>

               
  
               
  <!-- searchbar -->
  <form class="form-inline" method="POST" action="search.php">
    <input class="form-control mr-sm-2" type="search" name="searchName" placeholder="Search" onlick="searchBar()" aria-label="Search">
    <input class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit"  value="Search">
  </form>

                  
            </div>
        </nav>

    <div class="jumbotron" id="homee">
        <h1 class="display-4">Hello admin <?php echo htmlspecialchars(ucwords($_SESSION["username"])); ?>!</h1>
        <p class="lead">This is the homepage for admins! You can add, view teacher from the nav bar.</p>
        <hr class="my-4">
        <p>Request a feature!</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="mailto:mrbaslote@gmail.com" role="button">Contact</a>
        </p>
    </div>

        <div class="row">
        
    
            <div class="col" id="addTeacher"  style="display:none; padding-left:60px;">
                
                
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
                        <label>Contact No.</label>
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
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <small id="passwordHelpInline" class="text-muted">
                                 Must be 4-20 characters long.
                            </small>
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="addTeacher" class="btn btn-primary" value="Submit">
                        
                    </div>
                    
                </form>
            </div>    
                    
                    
            </div>


            
        
        

            <div class="col" id="viewTeacher" style="display:none;" >
                <h1 style="text-align:center">View Teacher</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                        
                       
                        
                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars(ucwords($row['Name']) )?></th>
                            <td><a href="mailto:<?php echo htmlspecialchars($row['Email']) ?>"><?php echo htmlspecialchars($row['Email']) ?></td>
                            <td><?php echo htmlspecialchars(ucwords($row['Address']) )?></td>
                            <td><?php echo htmlspecialchars($row['Contact']) ?></td>
                            <td><?php echo htmlspecialchars(ucwords($row['type'])) ?></td>
                            <td><a onclick="javascript:confirmationDelete($(this));return false;"  href="deleteProcess.php?id=<?php echo $row['id']; ?>"><img src="../icons/delete.svg" alt="Delete Teacher"></a></td>
                           
                        </tr>
                        <?php endwhile; ?>
                
                    </tbody>
                </table>
            </div>
        


            <div class="col" id="viewAttendance" style="display:none;" >
            <h1 style="text-align:center">View Teacher Attendance</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID Number</th>
                        <th scope="col">Name</th>
                        
                        <th scope="col">Attendance</th>
                        
                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $q1->fetch()): ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($row['idNumber']) ?></th>
                            <td><?php echo htmlspecialchars(ucwords($row['Name'])) ?></td>
                            <td><?php echo htmlspecialchars($row['attendance']) ?></td>
                        </tr>
                        <?php endwhile; ?>
                        
                    </tbody>
                </table>
            </div>
  
    </div>


   




<?php

include '../footer.php';
?>
    </body>
    </html>
