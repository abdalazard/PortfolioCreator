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
        $formStateQuery = "SELECT * FROM formState WHERE id_user LIKE '" . $id . "'";
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


    public function setImage($file, $typePicture)
    {
        $hoje = date("d-m-y");
        $ext = explode(".", $file['name']); //[foto][ferias][jpg]
        $ext = array_reverse($ext); //[jpg][ferias][foto]
        $ext = $ext[0]; //jpg


        if ((!isset($file))) {
            $path = "Arquivo inexistente!";
        } else {
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
                $path = "Arquivo de imagem inválido!";
                $file = 0;
                return $path;
            } else {
                $folder = "pasta_de_" . $_SESSION['user'];
                $num = rand(0, 9);
                $directory = "../../../images/users/" . $folder . "/" . $typePicture . "/";

                // if (is_dir($directory)) {
                //     $this->removeAllFilesAndSubdirectories("../../../images/users/" . $folder . "/");
                // }
                mkdir($directory, 0777, true);
                move_uploaded_file($file['tmp_name'], $directory . $_SESSION['user'] . "[" . $num . "]" . $hoje . '.' . $ext);
                
                $path = "images/users/" . $folder . "/" . $typePicture . "/" . $_SESSION['user'] . "[" . $num . "]" . $hoje . '.' . $ext;
                return $path;

            }
        }
    }

    public function setImages($files, $typePicture)
    {

        $hoje = date("d-m-y");
        $folder = "pasta_de_" . $_SESSION['user'];
        $directory = "../../../images/users/" . $folder . "/" . $typePicture . "/";
        // if (is_dir($directory)) {
        //     $this->removeAllFilesAndSubdirectories("../../../images/users/" . $folder . "/");
        // }
        mkdir($directory, 0777, true);
        $uploadedPaths = [];

        foreach ($files['tmp_name'] as $key => $tmpName) {
            $ext = pathinfo($files['name'][$key], PATHINFO_EXTENSION);
            $num = rand(0, 9);
            $newFileName = $_SESSION['user'] . "[" . $num . "]" . $hoje . '.' . $ext;
            $destination = $directory . $newFileName;

            if (move_uploaded_file($tmpName, $destination)) {
                $uploadedPaths[] = "images/users/" . $folder . "/" . $typePicture . "/" . $newFileName;
            } else {
                $uploadedPaths[] = "Erro no diretório " . $typePicture . "";
            }
        }

        return $uploadedPaths;
    }

    public function moreThanOne($userId)
    {
        $query = "SELECT * FROM profile WHERE id_user LIKE '" . $userId . "'";
        $db = new Connection;

        $linhas = mysqli_num_rows($db->toDatabase($query));
        if ($linhas >= 1) {
            return true;
        }
        return 0;
    }

    public function dataBase($query)
    {
        $db = new Connection;

        return $db->toDatabase($query);
    }

    //remove arquivos
    public function removeAllFilesAndSubdirectories($directory)
    {
        $files = scandir($directory);
    
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $path = $directory . '/' . $file;
    
                if (is_dir($path)) {
                    removeAllFilesAndSubdirectories($path); // Recursively remove subdirectories
                    rmdir($path);
                } else {
                    unlink($path); // Remove individual file
                }
            }
        }
    }
    
}
