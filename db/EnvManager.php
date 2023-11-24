<?php

class EnvManager {
    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable('../../');
        $dotenv->load();
    }
}
