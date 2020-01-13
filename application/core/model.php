<?php
class Model
{
    const DB_HOST = "";
    const DB_NAME = '';
    const CHARSET = '';
    const DB_USER = '';
    const DB_PASSWORD = '';
    public $db;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host='.self::DB_HOST.'; dbname='.self::DB_NAME.';charset=utf8', self::DB_USER, self::DB_PASSWORD);
        } catch (PDOExpection $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }  
    }
}
