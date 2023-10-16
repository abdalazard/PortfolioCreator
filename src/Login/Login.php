<?php
session_start();

include '../../db/Connection.php';

$user = $_POST['user'];
$password = MD5($_POST['password']);

$database = new Connection;

$findUsers = "SELECT * FROM users WHERE user LIKE '" . $user . "' AND password LIKE '" . $password . "'";
$userExists = $database->toDatabase($findUsers);
if (!$userExists) {
    $msg = "Problems to attempt to log in!";

    header('location: ../../admin.php?msg=' . $msg);
} else {
    $linhas = mysqli_num_rows($userExists);
    if ($linhas >= 1) {
        $data = mysqli_fetch_array($userExists);
        if (!strcmp($password, $data['password'])) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['user'] = $data['user'];
            $msg = "Logged successfully!";
            header('location: ../../pages/dashboard/dashboard.php?');
        }
    } else {
        $msg = "Wrong data!";
        header('location: ../../admin.php?msg=' . $msg);
    }
}