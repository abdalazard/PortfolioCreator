<?php
$table = "users";

try {
    $query = "CREATE TABLE " . $table . " (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(255) NOT NULL UNIQUE,
        pass VARCHAR(255) NOT NULL
    )";
    $db->toDatabase($query);
    
    echo "Tabela " . $table . " criada com sucesso!";
    echo "Status registrado com sucesso!";

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
