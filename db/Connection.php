<?php
include "EnvManager.php";

class Connection
{
    public $con;

    public function __construct()
    {
        new EnvManager();

        $localhost = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        $db = $_ENV['PROJECT_NAME'];
        
        $this->con = mysqli_connect($localhost, $user, $password, $db);

        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function toDatabase($query)
    {
        return mysqli_query($this->con, $query);
    }

    public function dd($item)
    {
        var_dump($item);
        die();
    }

    
}
