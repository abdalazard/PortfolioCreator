<?php
include '../../auth/Authentication.php';
include '../../db/Connection.php';

class Create {

    //User
    public $userId;
    //Database
    public $db;
    // public $query;

    //Profile
    public $imagem;
    public $titulo;
    public $subtitulo;
    
    //Projects
    public array $nome_projeto = [];
    public $link;

    //Skills
    public array $skills = [];

    //Others
    public array $others = [];

    //Social
    public $github;
    public $linkedin;

    public function __construct(){
        $this->db = new Connection;
        $this->userId = $_SESSION['id'];
    }

    public function setProfile($imagem, $titulo, $subtitulo) {
        //Profile   
        try{
            $this->imagem = $imagem;
            $this->titulo = $titulo;
            $this->subtitulo = $subtitulo;
            $table = "profile";
            $db->toDatabase($query);
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage() . " \nErro ao setar perfil";
        }
        
    }   
    
    public function setProjects($nome_projeto, $url) {
        //Project
        try{
            $this->nome_projeto = $nome_projeto;
            $this->link_projeto = $url;
            $query = '';
            $db->toDatabase($query);
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage() . " \nErro ao setar projeto";
        }
    }

    public function setSkill($skill) {
        //Skills
        try{
            $this->skills = $skill;
            $query = '';
            $db->toDatabase($query);
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage() . " \nErro ao setar habilidade";
        }
    }

    public function setOthers($others) {
        //Others
        try{
            $this->others = $others;
            $query = '';
            $db->toDatabase($query);
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage() . " \nErro ao setar outras tarefas";
        }
    }

    public function setSocial($github, $linkedin){
        try {
            //Social
            $this->github = $github;
            $this->linkedin = $linkedin;
            $query = '';
            $db->toDatabase($query);
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage() . " \nErro ao setar redes sociais";
        }
    }

    public function getUsers(){
        
    }
}