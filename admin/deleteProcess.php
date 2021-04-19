<?php

require_once "../database/config.php";

try{
    $sql = "DELETE FROM newteacher WHERE idNumber = :idNumber";  
    $pdo->exec($sql);
    echo "Records were deleted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>