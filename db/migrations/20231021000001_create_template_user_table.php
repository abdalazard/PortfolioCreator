<?php
$table = "template_user";

try {
    $query = "CREATE TABLE ".$table." (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        template_id INT(11) NOT NULL,
        id_user INT(11) NOT NULL UNIQUE,
        FOREIGN KEY (id_user) REFERENCES users(id),
        FOREIGN KEY (template_id) REFERENCES template(id)
    );";
    $db->toDatabase($query);

    echo "Table " . $table . " created successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
