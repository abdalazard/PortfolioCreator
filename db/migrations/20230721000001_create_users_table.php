<?php
$table = "users";

try {
    $query = "CREATE TABLE " . $table . " (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";
    $db->toDatabase($query);
    
    echo "Table " . $table . " created successfully!";
    echo "Status created successfully!";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
