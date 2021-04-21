<?php
//start xampp sudo /opt/lampp/lampp start

require_once "../database/config.php";
require "viewTeacherProcess.php";
require 'newTeacherProcess.php';




try{
    while ($row = $q->fetch(1)):
        $sql = "DELETE FROM newteacher WHERE id = '$row[0]'";  
        $pdo->exec($sql);

         header("Location: adminLogin.php?action=delete");

    endwhile;
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

 
// Close connection
unset($pdo);
?>