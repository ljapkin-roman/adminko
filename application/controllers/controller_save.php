<?php
class Controller_Save extends Controller
{
    public $model;
    public $view;
    public $errors = [];

    public function __construct() {
        $this->view = new View();
    }

    public function action_sent() {
        $this->model->check($_POST);
    }

    
}
