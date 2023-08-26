<?php
include '../../auth/Authentication.php';
include '../../db/Connection.php';

class Edit {

    //User
    public $userId;
    //Database
    public $db;

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
        $this->imagem = $imagem;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $query = '';
        $db->toDatabase($query);
    }   
    
    public function setProjects($nome_projeto, $url) {
        //Project
        $this->nome_projeto = $nome_projeto;
        $this->link_projeto = $url;
        $query = '';
        $db->toDatabase($query);
    }

    public function setSkill($skill) {
        //Skills
        $this->skills = $skill;
        $query = '';
        $db->toDatabase($query);
    }

    public function setOthers($others) {
        //Others
        $this->others = $others;
        $query = '';
        $db->toDatabase($query);
    }

    public function setSocial($github, $linkedin){
        //Social
        $this->github = $github;
        $this->linkedin = $linkedin;
        $query = '';
        $db->toDatabase($query);
    }
}