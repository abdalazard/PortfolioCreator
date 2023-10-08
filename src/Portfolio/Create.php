<?php


// public function setImage($file, $typePicture)
//     {
//         $hoje = date("d-m-y");
//         $ext = explode(".", $file['name']); //[foto][ferias][jpg]
//         $ext = array_reverse($ext); //[jpg][ferias][foto]
//         $ext = $ext[0]; //jpg


//         if ((!isset($file))) {
//             $path = "Arquivo inexistente!";
//         } else {
//             if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
//                 $path = "Arquivo de imagem inválido!";
//                 $file = null;
//                 return $path;
//             } else {
//                 $folder = "pasta_de_" . $_SESSION['user'];
//                 $num = rand(0, 9);
//                 $directory = "../../images/users/" . $folder . "/" . $typePicture . "/";

//                 if (is_dir($directory)) {
//                     removeAllFilesAndSubdirectories($directory);
//                 }
//                 mkdir($directory, 0777, true);
//                 move_uploaded_file($file['tmp_name'], $directory . $_SESSION['user'] . "[" . $num . "]" . $hoje . '.' . $ext);
//                 return $path = "images/users/" . $folder . "/" . $typePicture . "/" . $_SESSION['user'] . "[" . $num . "]" . $hoje . '.' . $ext;
//             }
//         }
//     }

//     public function setImages($files, $typePicture)
//     {

//         $hoje = date("d-m-y");
//         $folder = "pasta_de_" . $_SESSION['user'];
//         $directory = "../../images/users/" . $folder . "/" . $typePicture . "/";
//         if (is_dir($directory)) {
//             $this->removeAllFilesAndSubdirectories("../../images/users/" . $folder . "/" . $typePicture . "/");
//         }
//         mkdir($directory, 0777, true);
//         $uploadedPaths = [];

//         foreach ($files['tmp_name'] as $key => $tmpName) {
//             $ext = pathinfo($files['name'][$key], PATHINFO_EXTENSION);
//             $num = rand(0, 9);
//             $newFileName = $_SESSION['user'] . "[" . $num . "]" . $hoje . '.' . $ext;
//             $destination = $directory . $newFileName;

//             if (move_uploaded_file($tmpName, $destination)) {
//                 $uploadedPaths[] = "images/users/" . $folder . "/" . $typePicture . "/" . $newFileName;
//             } else {
//                 $uploadedPaths[] = "Erro no diretório " . $typePicture . "";
//             }
//         }

//         return $uploadedPaths;
//     }