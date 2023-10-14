<?php

class Portfolio
{
    public function getPage() {
        try {
            $selectPage  = "SELECT * FROM status WHERE status LIKE 1";
            $db = $this->dataBase($selectPage);
            if (!$db) {
                $msg = 'Erro ao obter status para portfolio';
                header("location: ../../noportfolio.php?msg=" . $msg);
            }
            $data = mysqli_fetch_array($db);

            return $data['id_user'] ?? 0;

        } catch (Exception $e) {
            $msg = "Erro: " . $e->getMessage() . "\nVocê não possui um portfolio!";
            header("location: noportfolio.php?msg=" . $msg);
        }
       
    }

    public function getState($id) {

        $formStateQuery = "SELECT * FROM formstate WHERE id_user LIKE '" . $_SESSION['id'] . "'";
        $db = $this->dataBase($formStateQuery);
        $data = mysqli_fetch_array($db);
        if (!$data) {
            $data = [
                'id' => 0,
                'userId' => 0,
                'profile' => 0,
                'skills' => 0,
                'projects' => 0,
                'others' => 0,
                'contacts' => 0,
                'msg' => 'Erro ao criar array!'
            ];
            return $data;
        }

        $id = $data['id'] ?? 0;
        $user = $data['id_user'] ?? 0;
        $profile = $data['profile'] ?? 0;
        $skills = $data['skills'] ?? 0;
        $projects = $data['projects'] ?? 0;
        $others = $data['others'] ?? 0;
        $contacts = $data['contacts'] ?? 0;

        $data = [
            'id' => $id,
            'userId' => $user,
            'profile' => $profile,
            'skills' => $skills,
            'projects' => $projects,
            'others' => $others,
            'contacts' => $contacts,
            'msg' => 'State encontrado!'

        ];
        return $data;
    }

    public function getStatus($id)
    {
        $statusQuery = "SELECT * FROM status WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($statusQuery);
        $data = mysqli_fetch_array($db);
        if (!$data) {
            $data = [
                'id' => 0,
                'status' => 0,
                'user' => 0,
                'msg' => "Sem status definido",
            ];
            return $data;
        }

        $id = $data['id'] ?? 0;
        $status = $data['status'] ?? 0;
        $user = $data['id_user'] ?? 0;

        $data = [
            'id' => $id,
            'status' => $status,
            'user' => $user,
            'msg' => "Status encontrado!",
        ];
        return $data;
    }

    public function getProfile($id)
    {
        $infoQuery = "SELECT * FROM profile WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($infoQuery);
        if ($data = mysqli_fetch_array($db)) {
            $id = $data['id'];
            $foto = $data['profile'];
            $titulo = $data['titulo'];
            $subtitulo = $data['subtitulo'];
        }

        $data = [
            'id' => $id,
            'profile' => $foto,
            'titulo' => $titulo,
            'subtitulo' => $subtitulo
        ];
        return $data;
    }

    public function getProjects($id)
    {
        $projetoQuery = "SELECT * FROM projects WHERE id_user = '" . $id . "'";
        $db = $this->dataBase($projetoQuery);
        $projects = array();

        while ($data = mysqli_fetch_array($db)) {
            $project = array(
                'print' => $data['print'],
                'project_name' => $data['nome_projeto'],
                'url_project' => $data['url']
            );
            $projects[] = $project;
        }

        return $projects;
    }

    public function getSkills($id)
    {
        $skillsQuery = "SELECT * FROM skills WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($skillsQuery);

        $skills = array();
        while ($data = mysqli_fetch_array($db)) {
            $skill = array(
                'id' => $data['id'],
                'skill' => $data['logo'],
            );
            $skills[] = $skill;
        }
        return $skills;
    }
    public function getOthers($id)
    {
        $othersQuery = "SELECT * FROM others WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($othersQuery);
        $others = array();
        while ($data = mysqli_fetch_array($db)) {
            $other = array(
                'id' => $data['id'],
                'titulo' => $data['titulo'],
                'banner' => $data['banner'],
                'banner_url' => $data['url'],
            );
            $others[] = $other;
        }

        return $others;
    }

    public function getSocial($id)
    {
        $socialQuery = "SELECT * FROM social WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($socialQuery);
        if (!$data = mysqli_fetch_array($db)) {
            return "Erro ao obter as redes sociais";  
        }
        $data = [
            'id' => $data['id'],
            'github' => $data['github'],
            'email' => $data['email'],
            'linkedin' => $data['linkedin']
        ];
        
        return $data;
    }


    // public function updateProfile($id, $data, $column) {

        // $profileQuery = "UPDATE `profile` SET ".$column." = '".$data."' WHERE `id` = '".$id."'";

    //     $db = $this->dataBase($profileQuery);
    //     if ($data = mysqli_fetch_array($db)) {
    //         $id = $data['id'];
    //         $foto = $data['profile'];
    //         $titulo = $data['titulo'];
    //         $subtitulo = $data['subtitulo'];
    //     }

    //     $data = [
    //         'id' => $id,
    //         'profile' => $foto,
    //         'titulo' => $titulo,
    //         'subtitulo' => $subtitulo
    //     ];
    //     return $data;
    // }

    // public function updateSkills($id, $data) {

    // }

    // public function updateProject($id, $data) {

    // }

    // public function updateOthers($id, $data) {

    // }

    // public function updateContact($id, $data) {

    // }


    public function setImage($file, $typePicture, $dir)
    {
        $ext = explode(".", $file['name']); //[foto][ferias][jpg]
        $ext = array_reverse($ext); //[jpg][ferias][foto]
        $ext = $ext[0]; //jpg

        if (!isset($file) || !is_uploaded_file($file['tmp_name'])) {
            $path = "Arquivo inexistente ou inválido!";
            return $path;
        } else {
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
                $path = "Arquivo de imagem inválido!";
                $file = '';
                return $path;
            } else {
                $folder = "pasta_de_" . $_SESSION['user'];
                $num = uniqid();
                // $directory = "../";
                if (is_dir($dir.$folder."/" . $typePicture . "/")) {
                    $this->removeAllFilesAndSubdirectories($dir.$folder."/" . $typePicture . "/");
                }
                mkdir($dir . $folder."/" . $typePicture . "/", 0777, true);

                move_uploaded_file($file['tmp_name'], $dir . $folder."/" . $typePicture . "/". $num . '.' . $ext);

                $path = "images/users/" . $folder . "/" . $typePicture . "/" . $num . '.' . $ext;
                return $path;

            }
        }
    }

    public function setImages($files, $typePicture, $dir)
    {

        $folder = "pasta_de_" . $_SESSION['user'];
        if (is_dir($dir.$folder."/" . $typePicture . "/")) {
            $this->removeAllFilesAndSubdirectories($dir.$folder."/" . $typePicture . "/");
        }
        mkdir($dir . $folder."/" . $typePicture . "/", 0777, true);
        $uploadedPaths = [];

        foreach ($files['tmp_name'] as $key => $tmpName) {
            $ext = pathinfo($files['name'][$key], PATHINFO_EXTENSION);
            $num = uniqid();
            $destination = $dir . $folder."/" . $typePicture . "/" . $num . '.' . $ext;
            if (move_uploaded_file($tmpName, $destination)) {
                $uploadedPaths[] = "images/users/" . $folder . "/" . $typePicture . "/" . $num . "." . $ext;
            } else {
                $uploadedPaths[] = "Erro no diretório " . $typePicture . "";
            }
        }

        return $uploadedPaths;
    }

    public function dataBase($query)
    {
        $db = new Connection;

        return $db->toDatabase($query);
    }

    //remove arquivos
    public function removeAllFilesAndSubdirectories($dir)
    {
            $files = array_diff(scandir($dir), array('.','..')); 
            foreach ($files as $file) { 
              (is_dir("$dir/$file")) ? removeAllFilesAndSubdirectories("$dir/$file") : unlink("$dir/$file"); 
            } 
            return rmdir($dir); 
      
        }
    
}
