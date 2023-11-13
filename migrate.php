<?php
require_once 'db/Connection.php';

$db = new Connection;
$userId = $_SESSION['id'];
$migrations = scandir(__DIR__ . '/db/migrations');

foreach ($migrations as $migration) {
    if ($migration === '.' || $migration === '..') {
        continue;
    }

    require_once 'db/migrations/' . $migration;

    echo "\nMigration done: $migration\n";
}

$db->toDatabase("INSERT INTO users VALUES(NULL, 'admin', MD5(123))");
echo "\nUser admin created successfully!!\n";;
?>