<?php
require_once 'db/Connection.php';
require_once 'vendor/autoload.php';

$userId = 1; 
$db = new Connection;

mkdir('images/users/admin_folder/teste', 0777, true);                    
echo "\nFake directory created";

// $db->toDatabase("INSERT INTO profile VALUES(null, 'images/users/admin_folder/profile/654db1eb7c27f.jpeg',	'sad',	'asd',	'".$userId."')");
// echo "\nFake profile created";
// $db->toDatabase("INSERT INTO others VALUES(null,	'asd',	'images/users/admin_folder/others/654db2041e13e.jpeg',	'asd',	'".$userId."')");
// echo "\nFake event created";
// $db->toDatabase("INSERT INTO contacts VALUES(null,	'asd',	'asd',	'asd',	'".$userId."')");
// echo "\nFake contact created";
// $db->toDatabase("INSERT INTO projects VALUES(null, 'images/users/admin_folder/projects/654db1fbc5a81.png',	'asd',	'asd',	'".$userId."')");
// echo "\nFake project created";

// $db->toDatabase("INSERT INTO skills VALUES(null,	'images/users/admin_folder/skills/654db1f440c3d.png',	'".$userId."'),
// (null,	'images/users/admin_folder/skills/654db1f440f1a.png',	'".$userId."'),
// (null,	'images/users/admin_folder/skills/654db1f441177.png',	'".$userId."'),
// (null,	'images/users/admin_folder/skills/654db1f44180b.png',	'".$userId."'),
// (null,	'images/users/admin_folder/skills/654db1f441a61.png',	'".$userId."');");
// echo "\nFake skills created";


$db->toDatabase("INSERT INTO `contacts` (`id`, `email`, `github`, `linkedin`, `id_user`) VALUES
(null,	'abdalazard@gmail.com',	'abdalazard',	'vinicius.abdala10',	'".$userId."')");
echo "\nFake contact created";

$db->toDatabase("INSERT INTO `others` (`id`, `title`, `banner`, `link`, `id_user`) VALUES
(null,	'Talking about TDD',	'images/users/admin_folder/others/654dc4734d325.jpeg',	'no links',	'".$userId."')");
echo "\nFake event created";

$db->toDatabase("INSERT INTO `profile` (`id`, `profile`, `title`, `subtitle`, `id_user`) VALUES
(null,	'images/users/admin_folder/profile/654dc429eef7e.jpeg',	'Olá, eu sou o Vinícius',	'Desenvolvedor PHP',	'".$userId."')");
echo "\nFake profile created";

$db->toDatabase("INSERT INTO `projects` (`id`, `screenshot`, `project_name`, `link`, `id_user`) VALUES
(null,	'images/users/admin_folder/projects/654dc44885828.png',	'Veddit',	'https://abdalazard.online/veddit', '".$userId."')");
echo "\nFake project created";

$db->toDatabase("INSERT INTO `skills` (`id`, `logo`, `id_user`) VALUES
(null,	'images/users/admin_folder/skills/654dc434564d5.png',	1),
(null,	'images/users/admin_folder/skills/654dc434566a6.png',	1),
(null,	'images/users/admin_folder/skills/654dc43456831.png',	1),
(null,	'images/users/admin_folder/skills/654dc43456ad7.png',	1),
(null,	'images/users/admin_folder/skills/654dc43456c7e.png',	1)");
echo "\nFake skills created";

$db->toDatabase("INSERT INTO state VALUES(null,	1,	1,	1,	1,	1,	'".$userId."')");
echo "\nFake state created";

$db->toDatabase("INSERT INTO status VALUES(null,	'1','".$userId."')");
echo "\nFake status created";

echo "\nMocking portfolio created successfully!!\n";;
?>


