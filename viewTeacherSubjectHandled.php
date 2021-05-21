<?php
require 'addstudent.php';


try {
    $sql4 = "SELECT * FROM teacher_subjects where teacher = ('$teacher') GROUP BY subject HAVING COUNT(Name) >=1";

   // $sql4 = "SELECT * FROM teacher_subjects GROUP BY subject HAVING COUNT(Name) >1";

    $q2 = $pdo->query($sql4);

    $q2->setFetchMode(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    die("Could not connect to the database :" . $e->getMessage());
}

?>