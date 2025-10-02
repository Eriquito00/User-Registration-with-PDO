<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once('../model/DAO/MySQLDAO/MySQLUser.php');
    require_once('../model/class/User.php');

    $id = $_POST["id"] ?? "";
    $name = $_POST["name"] ?? "";
    $surname = $_POST["surname"] ?? "";
    $email = $_POST["email"] ?? "";
    $telephone = $_POST["telephone"] ?? "";

    $userDAO = new MySQLUser(createConnection());

    if (isset($_POST['submit_create'])) {
        try {
            if (!telephoneIsValid($telephone)) throw new Exception("Use the +123 123456789 format.");
            $userDAO->create(new User("",$name, $surname, $email, $telephone));
            $id = $name = $surname = $email = $telephone = "";
        } catch (Exception $e) {
            $errorMessageCreate = $e->getMessage();
        }
        require_once('../view/create.php');
    }
    if (isset($_POST['submit_readall'])) {
        $users = $userDAO->readAll();
        require_once('../view/read.php');
    }
    if (isset($_POST['submit_update'])) {
        $userDAO->update($id, $name, $surname, $email, $telephone);
    }
    if (isset($_POST['submit_delete'])) {
        $userDAO->delete($id);
    }

    $userDAO = null;
}

function telephoneIsValid($telephone) {
    return preg_match('/^\+\d{1,3}\s\d{9}$/', $telephone);
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