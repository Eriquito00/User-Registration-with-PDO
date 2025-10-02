<?php
require_once('../model/DAO/MySQLDAO/MySQLUser.php');
require_once('../database/MySQLConnection.php');

$userDAO = new MySQLUser(createConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_delete'])){
    require_once("./controller.php");

    try {
        if (empty($userDAO->readOne($id))) throw new Exception("User with ID $id not found.");

        $userDAO->delete($id);
    }
    catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

$users = $userDAO->readAll();
$userDAO = null;

require_once('../view/delete.php');
?>