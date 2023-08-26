<?php
require_once 'db/Connection.php';

$migrations = scandir(__DIR__ . '/db/migrations');

foreach ($migrations as $migration) {
    if ($migration === '.' || $migration === '..') {
        continue;
    }

    require_once 'db/migrations/' . $migration;
    echo "\nExecutada a migração: $migration\n";
}
?>