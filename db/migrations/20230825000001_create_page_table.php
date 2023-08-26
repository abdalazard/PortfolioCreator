<?php

$table = "page_data";
try{
    $query = "CREATE TABLE ".$table." (
             id INT(11) AUTO_INCREMENT PRIMARY KEY,
             foto VARCHAR(255) NOT NULL,
             titulo VARCHAR(255) NOT NULL,
             subtitulo VARCHAR(255) NOT NULL,
             id_user INT,
            FOREIGN KEY (id_user) REFERENCES users(id)
     )";
    $db->toDatabase($query);

    echo "Tabela ".$table." criada com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}