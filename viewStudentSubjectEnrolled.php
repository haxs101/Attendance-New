<?php
require 'addstudent.php';



        try {
            $sql45 = "SELECT * FROM teacher_subjects WHERE teacher = ('$teacher') GROUP BY subject ";

            // $sql4 = "SELECT * FROM teacher_subjects GROUP BY subject HAVING COUNT(Name) >=1";

            $q3 = $pdo->query($sql45);

            $q3->setFetchMode(PDO::FETCH_ASSOC);

        }catch (PDOException $e) {
            die("Could not connect to the database :" . $e->getMessage());
        }


?>