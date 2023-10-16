<?php
$table = "state";

try {
    $query = "CREATE TABLE ".$table." (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        profile TINYINT(1) DEFAULT 0,
        skills TINYINT(1) DEFAULT 0,
        projects TINYINT(1) DEFAULT 0,
        others TINYINT(1) DEFAULT 0,
        contacts TINYINT(1) DEFAULT 0,
        id_user INT,
        FOREIGN KEY (id_user) REFERENCES users(id)

    );";
    $db->toDatabase($query);

    echo "Table " . $table . " created successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
