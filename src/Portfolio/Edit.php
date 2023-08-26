<?php

class Edit {

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

    public function setProfile($imagem, $titulo, $subtitulo) {
        //Profile   
        $this->imagem = $imagem;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        
    }   
    
    public function setProjects($nome_projeto, $url) {
        //Project
        $this->nome_projeto = $nome_projeto;
        $this->link_projeto = $url;
    }

    public function setSkill($skill) {
        //Skills
        $this->skills = $skill;
    }

    public function setOthers($others) {
        //Others
        $this->others = $others;
    }

    public function setSocial($github, $linkedin){
        //Social
        $this->github = $github;
        $this->linkedin = $linkedin;
    }
}