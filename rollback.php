<?php
require_once 'db/Connection.php';

$db = new Connection;
$db->toDatabase("DROP TABLE `state`,`status`,`profile`, `others`, `projects`, `skills`, `contacts`, `users`");

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
echo "Image files deleted\n";
echo "Rollback executed!";
echo "\nDatabase deleted successfully!\n\n";

$migrations = scandir(__DIR__ . '/db/migrations');

foreach ($migrations as $migration) {
    if ($migration === '.' || $migration === '..') {
        continue;
    }

    require_once 'db/migrations/' . $migration;

    echo "\nMigration done: $migration\n";
}
$dbB = new Connection;

$dbB->toDatabase("INSERT INTO users VALUES(NULL, 'admin', MD5(123))");
echo "\nUser admin created successfully!!\n";;
?>