<?php
$table = "social";

try {
    $query = "CREATE TABLE " . $table . " (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        github VARCHAR(255) NULL,
        linkedin VARCHAR(255) NULL,
        id_user INT,
        FOREIGN KEY (id_user) REFERENCES users(id)
    )";
    $db->toDatabase($query);

    echo "Tabela " . $table . " criada com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
