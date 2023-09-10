<?php

$table = "others";
try {
    $query = "CREATE TABLE " . $table . " (
             id INT(11) AUTO_INCREMENT PRIMARY KEY,
             titulo VARCHAR(255) NOT NULL
             banner VARCHAR(255) NULL NOT NULL,
             url VARCHAR(255) NULL,
             id_user INT,
            FOREIGN KEY (id_user) REFERENCES users(id)
     )";
    $db->toDatabase($query);

    echo "Tabela " . $table . " criada com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
