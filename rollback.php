<?php
require_once 'db/Connection.php';
require_once 'vendor/autoload.php';

$db = new Connection;
$db->toDatabase("DROP TABLE `state`,`status`,`profile`, `others`, `projects`, `skills`, `contacts`, template_user, `template`, `users`");

//remove arquivos
function removeAllFilesAndSubdirectories($directory) {
    if (is_dir($directory)) {
        $files = scandir($directory);
        
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $path = $directory . '/' . $file;
                
                if (is_dir($path)) {
                    removeAllFilesAndSubdirectories($path); 
                    rmdir($path);
                } else {
                    unlink($path); 
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

$dbB->toDatabase("INSERT INTO users VALUES(NULL, 'admin', MD5(".$_ENV['DB_PASSWORD']."))");
$db->toDatabase("INSERT INTO template VALUES(NULL, 'default', 1)");
$db->toDatabase("INSERT INTO template_user VALUES(NULL, 1, 1)");
echo "\nUser state created successfully!!\n";;

echo "\nUser admin created successfully!!\n";;
?>