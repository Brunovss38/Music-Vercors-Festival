<?php
final class Database
{
    private $_DB;

    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/utilisateurs.csv";
    }
}
