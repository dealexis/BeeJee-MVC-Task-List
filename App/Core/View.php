<?php

class View
{

    function render($content_view, $template_view, $data = null)
    {
        if(is_array($data)) {
            extract($data);
        }

        include 'App/Views/Templates/'.$template_view;
    }
}