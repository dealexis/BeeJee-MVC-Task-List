<?php

class ControllerMain extends Controller{

    var $model;

    function action_default()
    {

        $tasks = $this->model = new ModelMain();

        $data = array(
            'title' => 'BeeJee Таск Лист',
            'data' => $tasks->get_data(),
        );
        $this->view->render('main.php', 'default.tpl.php', $data);
    }
}
