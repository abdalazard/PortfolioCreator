CREATE Database portfolio1;

use portfolio1;

CREATE TABLE Usuarios(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user` VARCHAR(250) NOT NULL,
    'pass' VARCHAR(250) NOT NULL,
);
INSERT INTO Usuarios VALUES(NULL, 'admin', MD5(123));