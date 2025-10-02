<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST["id"] ?? "";
    $name = $_POST["name"] ?? "";
    $surname = $_POST["surname"] ?? "";
    $email = $_POST["email"] ?? "";
    $telephone = $_POST["telephone"] ?? "";

    if (isset($_POST['viewCreate'])) require_once('./create.php');
    elseif (isset($_POST['viewRead'])) require_once('./read.php');
    elseif (isset($_POST['viewUpdate'])) require_once('./update.php');
    elseif (isset($_POST['viewDelete'])) require_once('./delete.php');
}

function telephoneIsValid($telephone) {
    return preg_match('/^\+\d{1,3}\s\d{9}$/', $telephone);
}
?>