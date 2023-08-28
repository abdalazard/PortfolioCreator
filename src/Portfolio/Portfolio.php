<?php
include '../../db/Connection.php';

class Portfolio
{

    public function store($foto, $titulo, $subtitulo, $skill, $project_name, $url, $banner, $url_banner, $github, $linkedin, $userId)
    {
        try {
            $newInfo = "INSERT INTO info VALUES(null, '" . $foto . "', '" . $titulo . "', '" . $subtitulo . "', '" . $userId . "')";
            $this->dataBase($newInfo);
            $newSkill = "INSERT INTO skills VALUES(null, '" . $skill . "', '" . $userId . "')";
            $this->dataBase($newSkill);
            $newProject = "INSERT INTO projects VALUES(null, '" . $project_name . "', '" . $url . "', '" . $userId . "')";
            $this->dataBase($newProject);
            $newOthers =  "INSERT INTO others VALUES(null, '" . $banner . "', '" . $url_banner . "', '" . $userId . "')";
            $this->dataBase($newOthers);
            $newSocial = "INSERT INTO social VALUES(null, '" . $github . "', '" . $linkedin . "', '" . $userId . "')";
            $this->dataBase($newSocial);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage() . "\nErro ao gravar alguns dos dados do portfolio.";
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
