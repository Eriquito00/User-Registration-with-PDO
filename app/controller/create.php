<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_create'])){
    require_once('../model/DAO/MySQLDAO/MySQLUser.php');
    require_once('../database/MySQLConnection.php');
    require_once('../model/class/User.php');
    require_once('./controller.php');


    $userDAO = new MySQLUser(createConnection());

    try {
        if (!telephoneIsValid($telephone)) throw new Exception("Use the +123 123456789 format.");
        $userDAO->create(new User("",$name, $surname, $email, $telephone));
        $id = $name = $surname = $email = $telephone = "";
    }
    catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }

    $userDAO = null;
}
require_once('../view/create.php');
?>