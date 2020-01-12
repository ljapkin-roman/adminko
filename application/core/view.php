<?php
class View
{
    function generate($content_view, $template_view, $data = null, $errors = null)
    {
        include 'application/views/'.$template_view;
    }
}
