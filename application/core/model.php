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
        $address = $this->db->query("SELECT ter_address FROM t_koatuu_tree WHERE ter_address LIKE '%Харків%'");
        $list_addresses = [];
        foreach ($address as $item) {
            $list_addresses[] = $item[0];
        }
        $data['area'] = [];
        $data['town'] = [];
        $data['all'] = [];
        $list_town = $this->getTown($list_addresses);
        $list_area = $this->getArea($list_addresses);
        $townOfArea = $this->getTownOfArea($list_addresses, $list_area);
        foreach ($address as $item) {
            $data['all'][] = $item[0];
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
        $town_of_area = [];
        foreach($data['area'] as $area) {
            foreach($data['all'] as $item) {
                $pos = strpos($item, $area);
                if (!$pos === false) {
                    $name_town = explode(',', $item)[0];
                    $town_of_area[$area][] = $name_town;
                }
            } 
        }
        //print_r(json_encode($address, JSON_UNESCAPED_UNICODE));
    }


    public function getTownOfArea($list_address, $areas)
    {
        $town_of_area = [];
        foreach($areas as $area) {
            foreach($list_address as $address) {
                $pos = strpos($address, $area);
                if (!$pos === false) {
                    $name_town = explode(',', $address)[0];
                    $town_of_area[$area][] = $name_town;
                }
            } 
        }

        return $town_of_area;
    }


    public function getArea($addresses){
        $area = [];
        foreach ($addresses as $address) {
            $splitAddress = explode(',', $address);
            if (sizeof($splitAddress) === 3) {
                $nameArea = $splitAddress[1];
                if (strpos($nameArea, 'район') !== false && !in_array($nameArea, $area)) {
                    $area[] = $nameArea;
                }
            }
        }  
        return $area;
    }


    public function getTown($addresses) {
        $list_town = [];
        foreach ($addresses as $address) {
            $nameTown = explode(',', $address)[0];
            if (strpos($nameTown, 'м.') === 0) {
                $list_town[] = $nameTown;
            }
        }  
        return $list_town;
    }
}
