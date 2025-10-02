<?php
function createConnection(){
    $tempCon = new PDO("mysql:host=localhost;charset=utf8", "root", "");
    $tempCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $tempCon->exec(file_get_contents('../database/schema.sql'));
    
    $con = new PDO("mysql:host=localhost;dbname=usersdb;charset=utf8", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
}
?>