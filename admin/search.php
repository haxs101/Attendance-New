<?php
require 'newTeacherProcess.php';


 
    $search_keyword = '';
    if(!empty($_POST['searchName'])) {
        $search_keyword = $_POST['searchName'];
    }
    $sql = 'SELECT  * FROM teacher_attendance_record WHERE Name LIKE :keyword ';

    $pdo_statement = $pdo->prepare($sql);
    $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pdo_statement->execute();
/** 
    while($row = $pdo_statement->fetch()) {
        echo $row['Name'];
    }
*/
   // $result = $pdo_statement->setFetchMode(PDO::FETCH_ASSOC);


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
         <link rel="stylesheet" href="../css/background.css">
    <title>Document</title>
</head>
<body>
     
<div class="container" style="padding-top: 30px">

        <!-- search div -->
     <div class="col" id="searchBar" >
            <h1 style="text-align:center">View Teacher Attendance</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                       
                        <th scope="col">Name</th>
                        
                        <th scope="col">Attendance</th>
                        
                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $pdo_statement->fetch()): ?>
                        <tr>
                            
                            <td>
                                <?php 
                                    echo htmlspecialchars(ucwords($row['Name']));
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars(ucwords($row['attendance'])) ?></td>
                         
                        </tr>
                       
                     <?php endwhile; ?>   
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                        <li class="page-item">
                        <a class="page-link" href="adminLogin.php">Go back</a>
                        </li>
                </ul>
            </nav>
  
    

</div>
</body>
</html>