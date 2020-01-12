<?php
class Model
{
    public $db;
    public function __construct()
    {
        try {
            $this->db = new \PDO('mysql:host=localhost;dbname=testphp;charset=utf8', 'roma', 'taraNtul230678!');
        } catch (PDOExpection $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }  
    }
}
