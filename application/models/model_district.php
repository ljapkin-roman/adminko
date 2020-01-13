<?php
class Model_District extends Model
{

    public function getData($district)
    {
        $addresses = $this->db->query("SELECT ter_address FROM t_koatuu_tree WHERE ter_address LIKE '%{$district}%'");
        $list_addresses = [];
        foreach ($addresses as $address) {
            $list_addresses[] = $address[0];
        }
        $data = [];
        $listAreas = $this->getArea($list_addresses);
        $listTowns = $this->getTown($list_addresses);
        $villageOfArea = $this->getVillage($list_addresses, $listAreas);
        $data['areas'] = $listAreas;
        $data['towns'] = $listTowns;
        $data['villageOfArea'] = $villageOfArea;
        return $data;
    }

    public function getVillage($list_address, $areas)
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
