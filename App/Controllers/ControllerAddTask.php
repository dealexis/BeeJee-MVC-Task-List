<?php

class ControllerAddTask extends Controller{

    var $model;

    function action_default()
    {
        $data = [];
        $this->model = new ModelAddTask();
        if(!empty($_POST)){
            $data = $this->model->set_data();
        }

        $this->view->render('add-task.php', 'default.tpl.php', $data);

    }
}