<?php
class Model_Save extends Model
{
    public $errors = [];

    public function check($post) {
        //$this->isExist($post);
        foreach ($post as $key => $value) {
            if ($value === '' and $key !== 'area') {
                $this->errors[$key] ="Не может быть пустым";
            }
        }

        if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
           $this->errors['email'][] = "Не валидный емаил";
        }
        if ($this->hasValues($this->errors)) {
            $output = [];
            $output['data'] = $post;
            $output['errors'] = $this->errors;
            return $output;
        }else {
            $this->save($post);
            return "successful";
        }

    }

    public function save($post) {
        $insert = $this->db->prepare("INSERT INTO AddressUser (name, email, district, area, town) VALUES (:name, :email, :district, :area, :town)");
        $insert->bindParam(':name', $post['name']);
        $insert->bindParam(':email', $post['email']);
        $insert->bindParam(':district', $post['district']);
        $insert->bindParam(':area', $post['area']);
        $insert->bindParam(':town', $post['town']);
        
        $insert->execute();
    }

    public function hasValues($input, $deepCheck = true) {
        foreach($input as $value) {
            if(is_array($value) && $deepCheck) {
                if($this->hasValues($value, $deepCheck))
                    return true;
            }
            elseif(!empty($value) && !is_array($value))
                return true;
        }
        return false;
    }

    public function isExist($post) {
        $email = $this->db->prepare("SELECT * FROM AddressUser WHERE email=:email");
        $email->bindParam(':email', $post['email']);
        $email->execute();
        print_r($email->fetch());
    }
}
