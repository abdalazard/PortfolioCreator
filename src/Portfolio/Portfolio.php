<?php
include '../../db/Connection.php';

class Portfolio
{

    public function store($foto, $titulo, $subtitulo, $skill, $project_name, $url, $banner, $url_banner, $github, $linkedin, $userId)
    {
        try {
            //Profile
            $pathInfo = $this->setImage($foto, 'info');
            $newInfo = "INSERT INTO info VALUES(null, '" . $pathInfo . "', '" . $titulo . "', '" . $subtitulo . "', '" . $userId . "')";
            $this->dataBase($newInfo);

            //Skills
            $pathSkills = $this->setImage($skill, 'skill');
            $newSkill = "INSERT INTO skills VALUES(null, '" . $pathSkills . "', '" . $userId . "')";
            $this->dataBase($newSkill);

            //Project
            $newProject = "INSERT INTO projects VALUES(null, '" . $project_name . "', '" . $url . "', '" . $userId . "')";
            $this->dataBase($newProject);

            //Others
            $pathOthers = $this->setImage($banner, 'others');
            $newOthers =  "INSERT INTO others VALUES(null, '" . $pathOthers . "', '" . $url_banner . "', '" . $userId . "')";
            $this->dataBase($newOthers);

            //Social
            $newSocial = "INSERT INTO social VALUES(null, '" . $github . "', '" . $linkedin . "', '" . $userId . "')";
            $this->dataBase($newSocial);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados do portfolio.";
        }
    }

    public function setImage($foto, $typePicture)
    {
        //Necessário validar todos os dados
        $hoje = date("d-m-y");

        $ext = explode(".", $foto["name"]); //[foto][ferias][jpg]
        $ext = array_reverse($ext); //[jpg][ferias][foto]
        $ext = $ext[0]; //jpg
        if (!isset($foto)) {
            $path = null;
        } else {
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != " ") {
                $path = "Arquivo de imagem inválido!";
                $foto = null;
                return $path;
            } else {
                $folder = "pasta_de_" . $_SESSION['user'];

                if (!is_dir("../../images/users/" . $folder)) {
                    mkdir("../../images/users/" . $folder, 0755);

                    move_uploaded_file($foto["tmp_name"], "../../images/users/" . $folder . "/" . $typePicture . "/" . $_SESSION['user'] . $hoje . $typePicture . '.' . $ext);
                } else {
                    move_uploaded_file($foto["tmp_name"], "../../images/users/" . $folder . "/" . $typePicture . "/" . $_SESSION['user'] . $hoje . '.' . $ext);
                }
                $path = "users/" . $folder . "/" . $typePicture . "/" . $_SESSION['user'] . $hoje . '.' . $ext;
                return $path;
            }
        }
    }


    public function moreThanOne($userId)
    {
        $query = "SELECT * FROM info WHERE id_user LIKE '" . $userId . "'";
        $db = new Connection;

        $linhas = mysqli_num_rows($db->toDatabase($query));
        if ($linhas >= 1) {
            return true;
        }
        return false;
    }

    public function dataBase($query)
    {
        $db = new Connection;

        return $db->toDatabase($query);
    }
}
