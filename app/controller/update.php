<?php
require_once('../model/DAO/MySQLDAO/MySQLUser.php');
require_once('../database/MySQLConnection.php');

$userDAO = new MySQLUser(createConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update'])){
    require_once("./controller.php");
    require_once("../model/class/User.php");

    try {
        if (empty($userDAO->readOne($id))) throw new Exception("User with ID $id not found.");

        if (!telephoneIsValid($telephone)) throw new Exception("Use the +123 123456789 format.");
        $userDAO->update(new User($id, $name, $surname, $email, $telephone));
        $id = $name = $surname = $email = $telephone = "";
    }
    catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

$users = $userDAO->readAll();
$userDAO = null;

require_once('../view/update.php');
?>