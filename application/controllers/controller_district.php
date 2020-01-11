<?php
class Controller_District extends Controller
{
    public $model;

    function __construct() {
        $this->model = new Model_District();
    }
    
    function action_getdata($arg_function=0)
    {
        $arg_function = urldecode($arg_function);
        $this->model->getData($arg_function);
	    //print_r(json_encode($arg_function, JSON_UNESCAPED_UNICODE));
    }
}
