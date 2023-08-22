<?php
session_start();
session_destroy();
$msg = "Deslogado!";
header('location: ../../admin.php?msg=' . $msg);