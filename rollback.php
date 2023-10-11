<?php
require_once 'db/Connection.php';

$db = new Connection;
$db->toDatabase("DROP TABLE `formState`,`status`,`profile`, `others`, `projects`, `skills`, `social`, `users`");

//remove arquivos
function removeAllFilesAndSubdirectories($directory) {
    if (is_dir($directory)) {
        $files = scandir($directory);
        
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $path = $directory . '/' . $file;
                
                if (is_dir($path)) {
                    removeAllFilesAndSubdirectories($path); // Recursively remove subdirectories
                    rmdir($path);
                } else {
                    unlink($path); // Remove individual file
                }
            }
        }
    }
}

$directory = 'images/users/';
removeAllFilesAndSubdirectories($directory);
echo "Arquivos de imagens deletados\n";
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