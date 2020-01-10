<?php
class Controller_District extends Controller
{
    function action_getdata()
    {
	    print_r(json_encode($data, JSON_UNESCAPED_UNICODE));
    }
}
