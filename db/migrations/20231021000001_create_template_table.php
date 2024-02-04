<?php
$table = "template";

try {
    $query = "CREATE TABLE ".$table." (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL UNIQUE,
        creator_id INT(11) NOT NULL,
        FOREIGN KEY (creator_id) REFERENCES users(id)
    );";
    $db->toDatabase($query);
    echo "Table " . $table . " created successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


