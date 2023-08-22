<?php

$host = 'localhost';
$dbname = 'portfolio1';
$username = 'root';
$password = '123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $createTableQuery = "
        CREATE TABLE usuarios (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            user VARCHAR(255) NOT NULL,
            pass VARCHAR(255) NOT NULL
        )
    ";

    $pdo->exec($createTableQuery);

    echo "Tabela criada com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}