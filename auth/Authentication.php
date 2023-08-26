<?php
session_start();
if (!isset($_SESSION['id'])) {
    session_destroy();
    $msg = "Acesso negado!";
    header("location: ".__DIR__."/admin.php?msg=" . $msg);
}