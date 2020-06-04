<?php

class ModelEditTask extends Model{
    function set_data()
    {
        $name = $email = $text = '';
        $status = 'changed';
        $id = $_GET['task'];


        if(isset($_POST['username'])) $name = sanitize($_POST['username']);
        if(isset($_POST['email'])) $email = sanitize($_POST['email']);
        if(isset($_POST['text'])) $text = sanitize($_POST['text']);
        if(!empty($_POST['completed'])) $status = 'completed';

        if(empty($name) || empty($email) || empty($text)){
            return array('status' => false, 'text' => 'Одно или несколько полей не было заполнено.');
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            return array('status' => false, 'text' => 'Неверный формат почты.');
        }

        global $db;
        $table_tasks = DB_PREFIX . 'tasks';

        $sql = "UPDATE $table_tasks SET email=?, user=?, text=?, status=? WHERE id=?";
        $edit_task = $db->prepare($sql)->execute([$email, $name, $text, $status, $id]);

        $status = false;
        $status_text = 'Задача не была добавлена.';
        if(!empty($edit_task)){
            $status = true;
            $status_text = 'Задача изменена успешно';
        }

        return array('status' => $status, 'status_text' => $status_text);
    }

    function get_data()
    {
        $id = $_GET['task'];

        global $db;
        $table_tasks = DB_PREFIX . 'tasks';
        $get_task = "SELECT * FROM {$table_tasks} WHERE id = $id";
        $db_result = $db->query($get_task)->fetch();

        if(empty($db_result)) return die('Такой задачи не существует');
        return $db_result;
    }
}