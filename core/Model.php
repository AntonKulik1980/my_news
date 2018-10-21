<?php

class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Connection::dbFactory(include DB_CONFIG_FILE);
    }
}