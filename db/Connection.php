<?php

class Connection
{
    public $con;

    public function __construct()
    {
        
        $this->getEnv();
        // $localhost = $_ENV['DB_HOST'];
        // $user = $_ENV['DB_USERNAME'];
        // $password = $_ENV['DB_PASSWORD'];
        // $db = $_ENV['PROJECT_NAME'];

        $localhost = $_ENV['DB_HOST'] ?? 'localhost';
        $user = $_ENV['DB_USERNAME'] ?? 'root';
        $password = $_ENV['DB_PASSWORD'] ?? '123';
        $db = $_ENV['PROJECT_NAME'] ?? 'Devfolio';
        
        $this->con = mysqli_connect($localhost, $user, $password, $db);
    }
    public function toDatabase($query)
    {
        return mysqli_query($this->con, $query);
    }

    public function dd($item){
        var_dump($item);
        die();
    }

    public function getEnv() {
        require_once __DIR__.'../../vendor/autoload.php';
    
        // Ajuste o caminho com base na estrutura do seu projeto
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->safeLoad();


    }
}
