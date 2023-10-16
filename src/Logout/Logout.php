<?php
session_start();
session_destroy();
$msg = "You're out!";
header('location: ../../admin.php?msg=' . $msg);