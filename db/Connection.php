<?php


class Connection
{
    public $con;

    public function __construct()
    {

        $localhost = 'localhost';
        $user = 'root';
        $password = '123';
        $db = "portfolio1";
        
        $this->con = mysqli_connect($localhost, $user, $password, $db);
    }
    public function toDatabase($query)
    {
        return mysqli_query($this->con, $query);
    }
}
