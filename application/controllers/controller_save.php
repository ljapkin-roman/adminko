<?php
class Controller_Save extends Controller
{
    public $model;
    public $view;
    public $errors = [];

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Save();
    }

    public function action_sent()
    {
        $output = $this->model->check($_POST);
        if ($output['status'] === "successful" or $output['status'] === 'is exist') {
            $this->view->generate('main_view.php', 'successful.php', $data = $output);
        } else {
            $this->view->generate('main_view.php', 'template_view.php', $output['data'], $output['errors']);
        }
        
    }

    
}
