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

        $spy = "SELECT * FROM info WHERE id_user LIKE '" . $userId . "'";


        if ($this->dataBase($spy) == 0) {
            return false;
        }
        return true;
    }

    public function dataBase($query)
    {
        $db = new Connection;

        $db->toDatabase($query);
    }
}
