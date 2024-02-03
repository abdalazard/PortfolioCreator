<?php
include '../../../db/Connection.php';
include '../Devfolio.php';
require_once '../../../vendor/autoload.php';

session_start();

$userId = $_SESSION['id'];
$code = $_POST['status'] ?? 0;
$action = $_POST['action'];
$template = $_POST['template'];

if($action == "setStatus"){
    $devfolio = new Devfolio;
    $selectStatus = "SELECT * FROM status WHERE id_user LIKE '".$userId."'";
    $querySelect = $devfolio->dataBase($selectStatus);
    if(!$querySelect) {
        echo "Problems to attempt to verify this status";
    } else {
        $resultSelect = mysqli_num_rows($querySelect);
        if($resultSelect >= 1) {
            $updateStatus = "UPDATE status SET status = '".$code."' WHERE id_user LIKE '".$userId."'";
            $queryUpdate = $devfolio->dataBase($updateStatus);

            $updateTemplate = "UPDATE template_user SET template_id = '".$template."' WHERE id_user LIKE '".$userId."'";
            $queryUpdateTemplate = $devfolio->dataBase($updateTemplate);

        } else {
            $createStatus = "INSERT INTO status VALUES(null, 0, '".$userId."')";
            $queryCreate = $devfolio->dataBase($createStatus);
            echo "Status created sucessfully!";

            $updateTemplate = "UPDATE template_user SET template_id = '".$template."' WHERE id_user LIKE '".$userId."'";
            $devfolio->dataBase($setDefaultTemplate);
            echo "Template settings done sucessfully!";            
        }
        echo "Status 200";
    }
} else {
    echo "Invalid action!";
}
?>
