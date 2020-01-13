<?php
class Controller_District extends Controller
{
    public $model;

    function __construct()
    {
        $this->model = new Model_District();
    }
    
    function action_getdata($arg_function=0)
    {
        $arg_function = urldecode($arg_function);
        $output = $this->model->getData($arg_function);
        print_r(json_encode($output, JSON_UNESCAPED_UNICODE));
    }
}
