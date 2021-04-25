<?php
//start xampp sudo /opt/lampp/lampp start

require_once "../database/config.php";
require "viewTeacherProcess.php";
require 'newTeacherProcess.php';





try{
    
        $sql = "DELETE FROM newteacher WHERE id = '" . $_GET["id"] . "'";  
        $pdo->exec($sql);

         header("Location: adminLogin.php?action=delete");

 
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

 
// Close connection
unset($pdo);
?>