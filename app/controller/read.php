<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once('../model/DAO/MySQLDAO/MySQLUser.php');
    require_once('../database/MySQLConnection.php');
    require_once("./controller.php");

    $userDAO = new MySQLUser(createConnection());

    try {
        if (isset($_POST['submit_readAll'])) $users = $userDAO->readAll();
        elseif (isset($_POST['submit_readOne'])) {
            $user = $userDAO->readOne($id);
            if (empty($user)) throw new Exception("User with ID $id not found.");
            $users = $user ? [$user] : [];
        }
    }
    catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }

    $userDAO = null;
}
require_once('../view/read.php');
?>