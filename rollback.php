SET foreign_key_checks = 0;
DROP TABLE `info`, `others`, `projects`, `skills`, `social`, `users`;

<?php
require_once 'db/Connection.php';
$db = new Connection;
$db->toDatabase("DROP TABLE `info`, `others`, `projects`, `skills`, `social`, `users`");

echo "Você executou o rollback!";
echo "\nBanco de dados deletado com sucesso!\n\n";

$migrations = scandir(__DIR__ . '/db/migrations');

foreach ($migrations as $migration) {
    if ($migration === '.' || $migration === '..') {
        continue;
    }

    require_once 'db/migrations/' . $migration;

    echo "\nExecutada a migração: $migration\n";
}
$dbB = new Connection;

$dbB->toDatabase("INSERT INTO users VALUES(NULL, 'admin', MD5(123))");
echo "\nUsuario administrador criado com sucesso!\n";;
?>