<?php

class Connection
{
    public $con;

    public function __construct()
    {
        $localhost = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $db = $_ENV['PROJECT_NAME'];
        
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
}
