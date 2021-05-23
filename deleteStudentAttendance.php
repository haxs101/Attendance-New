<?php
require 'viewTeacherSubjectHandled.php';

try{
    
    $sql = "DELETE FROM student_attendance_record WHERE id = '" . $_GET["id"] . "'";  
    $pdo->exec($sql);

     header("Location: teacher.php?action=deleteAttendance");


} catch(PDOException $e){
die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>