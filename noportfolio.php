<?php
include "db/Connection.php";

include 'src/Portfolio/Portfolio.php';

try {
    $getPort = new Portfolio;
    $getPage = $getPort->getPage();
    if($getPage != null){
        
        header("location: index.php");
    }
    include_once 'icon/network.php';
} catch (Exception $e) {
    $msg = "Erro: " . $e->getMessage() . "\nVocê não possui um portfolio!";
    ?><script>alert($msg);</script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio não encontrado</title>
    <style>
        #msg {
            background-color: black;
            color: white;
            text-align: center; /* Adicionado para centralizar a mensagem */
            position: absolute; /* Adicionado para centralizar na tela */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div id="msg">
        <?php
        if(isset($_GET['msg'])){
            echo "Erro! \n".$_GET['msg'];
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        M.AutoInit();
        $("#msg").addClass("msg");
        $(document).ready(function() {
            // setTimeout(function() {
            //     $('#msg').fadeOut();
            // }, 10000);
        });
    </script>
</body>
</html>
