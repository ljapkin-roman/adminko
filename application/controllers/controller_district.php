<?php
class Controller_District extends Controller
{
    function action_getdata($arg_function=0)
    {
	    //print_r(utf8_encode($arg_function));
	    print_r(json_encode($arg_function, JSON_UNESCAPED_UNICODE));
    }
}
