<?php

$table = "profile";
try {
    $query = "CREATE TABLE " . $table . " (
             id INT(11) AUTO_INCREMENT PRIMARY KEY,
             profile VARCHAR(255) NULL,
             title VARCHAR(255) NULL,
             subtitle VARCHAR(255) NULL,
             id_user INT,
            FOREIGN KEY (id_user) REFERENCES users(id)
     )";
    $db->toDatabase($query);

    echo "Table " . $table . " create successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}