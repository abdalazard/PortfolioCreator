<?php


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

    public function getInfo($id)
    {
        $infoQuery = "SELECT * FROM info WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($infoQuery);
        if ($data = mysqli_fetch_array($db)) {
            $foto = $data['foto'];
            $titulo = $data['titulo'];
            $subtitulo = $data['subtitulo'];
        }

        $data = [
            'path' => $foto,
            'titulo' => $titulo,
            'subtitulo' => $subtitulo
        ];
        return $data;
    }

    public function getProjects($id)
    {
        $infoQuery = "SELECT * FROM projects WHERE id_user = '" . $id . "'";
        $db = $this->dataBase($infoQuery);
        $projects = array();

        while ($data = mysqli_fetch_array($db)) {
            $project = array(
                'project_name' => $data['nome_projeto'],
                'url_project' => $data['url']
            );
            $projects[] = $project;
        }

        return $projects;
    }

    public function getSkills($id)
    {
        $infoQuery = "SELECT * FROM skills WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($infoQuery);

        $skills = array();
        while ($data = mysqli_fetch_array($db)) {
            $skill = array(
                'skill' => $data['logo'],
            );
            $skills[] = $skill;
        }
        return $skills;
    }
    public function getOthers($id)
    {
        $infoQuery = "SELECT * FROM others WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($infoQuery);
        $others = array();
        while ($data = mysqli_fetch_array($db)) {
            $other = array(
                'banner' => $data['banner'],
                'banner_url' => $data['url'],
            );
            $others[] = $other;
        }

        return $others;
    }

    public function getSocial($id)
    {
        $infoQuery = "SELECT * FROM social WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($infoQuery);
        if ($data = mysqli_fetch_array($db)) {
            $github = $data['github'];
            $linkedin = $data['linkedin'];
            // $email = $data['email'];
        }

        $data = [
            'github' => $github,
            // 'email' => $email,
            'linkedin' => $linkedin
        ];
        return $data;
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
            if ($ext != "png" && $ext != " ") {
                $path = "Arquivo de imagem inválido!";
                $foto = null;
                return $path;
            } else {
                $folder = "pasta_de_" . $_SESSION['user'];

                if (!is_dir("images/users/" . $folder . "/" . $typePicture . "/")) {
                    mkdir("images/users/" . $folder . "/" . $typePicture . "/", 0755);

                    move_uploaded_file($foto["tmp_name"], "images/users/" . $folder . "/" . $typePicture . "/" . $_SESSION['user'] . $hoje . '.' . $ext);
                } else {
                    move_uploaded_file($foto["tmp_name"], "images/users/" . $folder . "/" . $typePicture . "/" . $_SESSION['user'] . $hoje . '.' . $ext);
                }
                $path = "images/users/" . $folder . "/" . $typePicture . "/" . $_SESSION['user'] . $hoje . '.' . $ext;
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