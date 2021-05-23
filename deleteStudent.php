<?php
require 'viewTeacherSubjectHandled.php';

try{
    
    $sql = "DELETE FROM teacher_subjects WHERE id = '" . $_GET["id"] . "'";  
    $pdo->exec($sql);

     header("Location: teacher.php?action=delete");


} catch(PDOException $e){
die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    
    $sql = "DELETE FROM newstudent WHERE id = '" . $_GET["id"] . "'";  
    $pdo->exec($sql);

    

} catch(PDOException $e){
die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);

?>