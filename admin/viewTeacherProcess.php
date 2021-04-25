<?php

require '../vendor/autoload.php';
//require_once "../database/mailerconfig.php";
require_once "../database/config.php";
 


try {
    $sql = 'SELECT * FROM newteacher';

    $q = $pdo->query($sql);

    $q->setFetchMode(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}


?>