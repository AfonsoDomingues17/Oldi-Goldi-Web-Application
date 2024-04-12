<?php 
function getDatabaseConnection(){
    $db = new PDO('sqlite:database/project.db');
    return $db;
}

?>