<?php

class Devfolio
{

    public function getUser() {
        try {
            $selectUser = "SELECT user, id FROM users WHERE id LIKE '" . $_SESSION['id'] . "'";
            $db = $this->dataBase($selectUser);
            $data = mysqli_fetch_array($db);
            if (!$data) {
                $msg = "Problems to get this devfolio";
                header("location: ../../pages/dashboard/dashboard.php?msg=" . $msg);
            } else {
                $filter = ['user', 'id'];
                $filteredData = array_filter($data, function($value) {
                    return !is_null($value) && $value !== '';
                });
                $data = array_intersect_key($filteredData, array_flip($filter));

                $user = $data;
            }
            return $user;

        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getTemplates() {
        try {
            $allTemplates = "SELECT * FROM template";
            $db = $this->dataBase($allTemplates);
            $data = [];
            while ($row = mysqli_fetch_array($db)) {
                $phpFile = "../../../templates/" . $row['name'] . "/" . $row['name'] . ".php";
                $cssFile = "../../../templates/" . $row['name'] . "/" . $row['name'] . ".css";
                $jsFile = "../../../templates/" . $row['name'] . "/" . $row['name'] . ".js";

                if (file_exists($phpFile) && file_exists($cssFile) && file_exists($jsFile)){
                    $data[] = $row;
                }
            }
            return $data;
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        } 
    }

    public function templateVisualization($template_id, $userId) {
        try {
            
            if($template_id) {
                $selectVisualization = "SELECT * FROM template WHERE id LIKE '" .$template_id. "'";
            } else {
                $getTemplate = $this->getTemplate($userId);
                $selectVisualization = "SELECT * FROM template WHERE id LIKE '" .$getTemplate['id']. "'";     
            }

            $db = $this->dataBase($selectVisualization);
            $data = mysqli_fetch_array($db);
            if (!$data) {
                $msg = "Problems to get this devfolio";
                header("location: ../../nodevfolio.php?msg=" . $msg);
            } else {
                $template = $data;
            }
            return $template;

        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();           
        }        
    }

    public function getTemplate($template_user_id) {
        try {
            $selectTemplate = "SELECT users.id, template.* 
                FROM users 
                LEFT JOIN template_user ON users.id = template_user.id_user 
                LEFT JOIN template ON template.id = template_user.template_id 
                WHERE users.id = '".$template_user_id."'";

            $dbTemplate = $this->dataBase($selectTemplate);
            if($dbTemplate) {
                $template = mysqli_fetch_array($dbTemplate);
                $filter = ['name', 'id', 'creator_id'];
                $filteredData = array_filter($template, function($value) {
                    return !is_null($value) && $value !== '';
                });
                $template = array_intersect_key($filteredData, array_flip($filter));

            } else {
                $template = null;
            }
            
            return $template;

        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        } 
    }

    public function createTemplate($template_name, $userId) {
        try {
            $checkQuery = "SELECT * FROM template WHERE name = '" . $template_name . "'";
            $checkResult = $this->dataBase($checkQuery);
            if ($checkResult && mysqli_num_rows($checkResult) > 0) {
                $msg = "A template with this name already exists for this user.";
            } else {
                $insertTemplate = "INSERT INTO template (name, creator_id) VALUES ('" . $template_name . "', '" . $userId . "')";
                $db = $this->dataBase($insertTemplate);
                if ($db) {
                    // Create directory
                    if (!is_dir('../../../templates/' . $template_name)) {
                        mkdir('../../../templates/' . $template_name);
                    }

                    // Create HTML file
                    file_put_contents('../../../templates/' . $template_name . '/'.$template_name.'.php', '');

                    // Create CSS file
                    file_put_contents('../../../templates/' . $template_name . '/'.$template_name.'.css', '');

                    // Create JS file
                    file_put_contents('../../../templates/' . $template_name . '/'.$template_name.'.js', '');

                    $msg = "Template created!";
                } else {
                    $msg = "Problems to create this template!";
                }
            }            

            return $msg;

        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        } 
    }

    public function getVisualizationPage() {
        try {
            $selectPage  = "SELECT * FROM status";
            $db = $this->dataBase($selectPage);
            if (!$db) {
                $msg = 'Problems to get this devfolio';
                header("location: ../../nodevfolio.php?msg=" . $msg);
            }
            $data = mysqli_fetch_array($db);

            return $data['id_user'] ?? null;

        } catch (Exception $e) {
            $msg = "Error: " . $e->getMessage() . "\nYou don't have any devfolio created!";
            header("location: ../../nodevfolio.php?msg=" . $msg);
        }
       
    }

    public function getPage($status) {
        try {
            $selectPage  = "SELECT * FROM status WHERE status LIKE $status";
            $db = $this->dataBase($selectPage);
            if (!$db) {
                $msg = 'Problems to get this devfolio';
                header("location: ../../nodevfolio.php?msg=" . $msg);
            }
            $data = mysqli_fetch_array($db);

            return $data['id_user'] ?? 0;

        } catch (Exception $e) {
            $msg = "Error: " . $e->getMessage() . "\nYou don't have any devfolio created!";
            header("location: nodevfolio.php?msg=" . $msg);
        }
       
    }

    public function getState() {

        $stateQuery = "SELECT * FROM state WHERE id_user LIKE '" . $_SESSION['id'] . "'";
        $db = $this->dataBase($stateQuery);
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
                'msg' => 'Problems to attempt to create an array of states!'
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
            'msg' => 'State found!'

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
                'msg' => "No status defined",
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
            'msg' => "Status found!",
        ];
        return $data;
    }

    public function getProfile($id)
    {
        $infoQuery = "SELECT * FROM profile WHERE id_user LIKE '" . $id . "'";
        $db = $this->dataBase($infoQuery);
        if ($data = mysqli_fetch_array($db)) {
            $id = $data['id'];
            $profile = $data['profile'];
            $title = $data['title'];
            $subtitle = $data['subtitle'];
        }

        $data = [
            'id' => $id,
            'profile' => $profile,
            'title' => $title,
            'subtitle' => $subtitle
        ];
        return $data;
    }

    public function getProjects($id)
    {
        $projectQuery = "SELECT * FROM projects WHERE id_user = '" . $id . "'";
        $db = $this->dataBase($projectQuery);
        $projects = array();

        while ($data = mysqli_fetch_array($db)) {
            $project = array(
                'id' => $data['id'],
                'screenshot' => $data['screenshot'],
                'project_name' => $data['project_name'],
                'project_link' => $data['link']
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
                'title' => $data['title'],
                'banner' => $data['banner'],
                'banner_link' => $data['link'],
            );
            $others[] = $other;
        }

        return $others;
    }

    public function getContacts($id)
    {
        $socialQuery = "SELECT * FROM contacts WHERE id_user LIKE '" . $id . "'";
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

    public function setImage($file, $typePicture, $dir) {
        $ext = explode(".", $file['name']); //[profile][ferias][jpg]
        $ext = array_reverse($ext); //[jpg][ferias][profile]
        $ext = $ext[0]; //jpg

        if (!isset($file) || !is_uploaded_file($file['tmp_name'])) {
            $path = "Nonexistent or invalid file!";
            return $path;
        } else {
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
                $path = "Invalid image file!";
                $file = '';
                return $path;
            } else {
                $folder = $_SESSION['user']. "_folder";
                $num = uniqid();
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

    public function setImageProject($file, $typePicture, $dir)
    {
        $ext = explode(".", $file['name']); //[profile][ferias][jpg]
        $ext = array_reverse($ext); //[jpg][ferias][profile]
        $ext = $ext[0]; //jpg

        if (!isset($file) || !is_uploaded_file($file['tmp_name'])) {
            $path = "Nonexistent or invalid file!";
            return $path;
        } else {
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
                $path = "Invalid image file!";
                $file = '';
                return $path;
            } else {
                $folder = $_SESSION['user']. "_folder";
                $num = uniqid();               
                move_uploaded_file($file['tmp_name'], $dir . $folder."/" . $typePicture . "/". $num . '.' . $ext);

                $path = "images/users/" . $folder . "/" . $typePicture . "/" . $num . '.' . $ext;
                return $path;

            }
        }
    }

    public function setImageOthers($file, $typePicture, $dir)
    {
        $ext = explode(".", $file['name']); //[profile][ferias][jpg]
        $ext = array_reverse($ext); //[jpg][ferias][profile]
        $ext = $ext[0]; //jpg

        if (!isset($file) || !is_uploaded_file($file['tmp_name'])) {
            $path = "Nonexistent or invalid file!";
            return $path;
        } else {
            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
                $path = "Invalid image file!";
                $file = '';
                return $path;
            } else {
                $folder = $_SESSION['user']. "_folder";
                $num = uniqid();               
                move_uploaded_file($file['tmp_name'], $dir . $folder."/" . $typePicture . "/". $num . '.' . $ext);

                $path = "images/users/" . $folder . "/" . $typePicture . "/" . $num . '.' . $ext;
                return $path;

            }
        }
    }
    
    public function deleteImages($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }
    
        return rmdir($dir);
    }

    public function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }
    
        return rmdir($dir);
    }
    

    public function setImages($files, $typePicture, $dir, $action = null)
    {

        $folder = $_SESSION['user']. "_folder";
        if(!$action) {
            if (is_dir($dir.$folder."/" . $typePicture . "/")) {
                $this->removeAllFilesAndSubdirectories($dir.$folder."/" . $typePicture . "/");
            }
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
                $uploadedPaths[] = "Problemas with the directory " . $typePicture . "";
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