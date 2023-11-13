<?php
session_start();
if (!isset($_SESSION['id'])) {
    session_destroy();
    $msg = "Acesso denied!";
    header("location: ../../admin.php?msg=" . $msg);
}