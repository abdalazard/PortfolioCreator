<?php

$table = "skills";
try {
    $query = "CREATE TABLE " . $table . " (
             id INT(11) AUTO_INCREMENT PRIMARY KEY,
             logo VARCHAR(255) NULL,
             id_user INT,
            FOREIGN KEY (id_user) REFERENCES users(id)
     )";
    $db->toDatabase($query);

    echo "Table " . $table . " created successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
