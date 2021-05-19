<?php
require 'addstudent.php';


try {
    $sql3 = "SELECT * FROM student_attendance_record where teacher = ('$teacher')";

    $q = $pdo->query($sql3);

    $q->setFetchMode(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    die("Could not connect to the database :" . $e->getMessage());
}

?>