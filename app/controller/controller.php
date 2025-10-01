<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST["id"] ?? "";
    $name = $_POST["name"] ?? "";
    $surname = $_POST["surname"] ?? "";
    $email = $_POST["email"] ?? "";
    $telephone = $_POST["telephone"] ?? "";

    require_once('../model/DAO/MySQLDAO/MySQLUser.php');
    $userDAO = new MySQLUser(createConnection());

    if (isset($_POST['submit_create'])) {
        if (!$userDAO->checkEmailExists($email)) throw new Exception("Email already exists");
        if (!$userDAO->checkTelephoneExists($telephone)) throw new Exception("Telephone already exists");
        $userDAO->create($name, $surname, $email, $telephone);
    }
    elseif (isset($_POST['submit_read'])) {
        $userDAO->read();
        require_once('./app/view/read.php');
    }
    elseif (isset($_POST['submit_update'])) {
        if (!$userDAO->checkEmailExists($email)) throw new Exception("Email already exists");
        if (!$userDAO->checkTelephoneExists($telephone)) throw new Exception("Telephone already exists");
        $userDAO->update($id, $name, $surname, $email, $telephone);
    }
    elseif (isset($_POST['submit_delete'])) {
        $userDAO->delete($id);
    }

    $userDAO = null;
}

function createConnection(){
    $tempCon = new PDO("mysql:host=localhost;charset=utf8", "root", "");
    $tempCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $tempCon->exec(file_get_contents('../database/schema.sql'));
    
    $con = new PDO("mysql:host=localhost;dbname=usersdb;charset=utf8", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
}
?>