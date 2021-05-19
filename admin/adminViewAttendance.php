<?php
require 'newTeacherProcess.php';


try {
    $sql3 = "SELECT * FROM teacher_attendance_record";

    $q1 = $pdo->query($sql3);

    $q1->setFetchMode(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    die("Could not connect to the database :" . $e->getMessage());
}

?>