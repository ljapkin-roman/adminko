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
    public function getData($district)
    {
        $address = $this->db->query("SELECT ter_address FROM t_koatuu_tree WHERE ter_address LIKE '%{$district}%'");
        $data['area'] = [];
        $data['town'] = [];
        foreach ($address as $item) {
            $splitAddress = explode(',', $item[0]);
            if (sizeof($splitAddress) === 3) {
                $nameArea = explode(',', $item[0])[1];
                if (strpos($nameArea, 'район') !== false && !in_array($nameArea, $data['area'])) {
                    $data['area'][] = $nameArea;
                }
            }
            $nameTown = explode(',', $item[0])[0];
            if (strpos($nameTown, 'м.') === 0) {
                $data['town'][] = $nameTown;
            }
        }  
        print_r(json_encode($data, JSON_UNESCAPED_UNICODE));
    }
    public function getTownOfArea($district, $area)
    {
        $address = $this->db->query("SELECT ter_address FROM t_koatuu_tree WHERE ter_address LIKE '%{$district}%' AND ter_address LIKE '%{$area}%'");
        $data['town'] = [];
        foreach ($address as $item) {
            $data['town'][] = explode(',', $item[0])[0];
        }
        print_r(json_encode($data, JSON_UNESCAPED_UNICODE));
    }
}
