<?php
session_start();

include '../../db/Connection.php';

$user = $_POST['user'];
$password = MD5($_POST['pass']);

$database = new Connection;

$findUsers = "SELECT * FROM usuarios WHERE user LIKE '" . $user . "' AND pass LIKE '" . $password . "'";
$userExists = $database->toDatabase($findUsers);
if (!$userExists) {
    $msg = "Erro na tentativa de login!";

    header('location: ../../admin.php?msg=' . $msg);
} else {
    $linhas = mysqli_num_rows($userExists);
    if ($linhas >= 1) {
        $data = mysqli_fetch_array($userExists);
        if (!strcmp($password, $data['pass'])) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['user'] = $data['user'];

            header('location: ../../pages/dashboard/dashboard.php?');
        }
    } else {
        $msg = "Dados incorretos!";
        header('location: ../../admin.php?msg=' . $msg);
    }
}