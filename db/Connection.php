<?php

class Connection
{
    public $con;

    public function __construct()
    {
        $this->con = mysqli_connect('localhost', 'root', '123', 'portfolio1');
    }


    public function toDatabase($query)
    {
        return mysqli_query($this->con, $query);
    }
}