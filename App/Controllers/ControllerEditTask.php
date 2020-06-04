<?php

class ControllerEditTask extends Controller{

    var $model;

    public function action_default()
    {

        if($_SESSION['logged_in'] != true || empty($_GET['task'])){
            die('Вы не можете редактировать задачи');
        }

        $data = [];
        $this->model = new ModelEditTask();
        if(!empty($_POST)){
            $data = $this->model->set_data();
        }else{
            $data = $this->model->get_data();
        }

        $this->view->render('edit-task.php', 'default.tpl.php', $data);
    }
}