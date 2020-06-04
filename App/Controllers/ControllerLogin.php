<?php

class ControllerLogin extends Controller{

    var $model;

    function action_default()
    {

        if(isset($_GET['logout'])){
            unset($_SESSION['logged_in']);
            session_destroy();
            header('Location: /');
        }

        $data = '';
        if(!empty($_POST)){
            //logic login
            $login = $this->model = new ModelLogin();
            $data = $login->set_data();
        }

        $this->view->render('login.php', 'default.tpl.php', $data);
    }
}