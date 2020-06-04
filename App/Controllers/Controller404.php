<?php

class Controller404 extends Controller{
    function action_default()
    {
        $this->view->render('404.php', 'default.tpl.php');
    }
}