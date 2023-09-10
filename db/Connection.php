<?php


class Connection
{
    public $con;

    public function __construct()
    {
        include '../../config.php';

        $this->con = mysqli_connect($localhost, $user, $password, $db);
    }
    public function toDatabase($query)
    {
        return mysqli_query($this->con, $query);
    }
}
