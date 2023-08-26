<?php

$db = new Connection;

$table = "users";

try{
    $query = "CREATE TABLE ".$table." (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(255) NOT NULL,
        pass VARCHAR(255) NOT NULL
    )";
    $db->toDatabase($query);

    echo "Tabela ".$table." criada com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}