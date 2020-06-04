<?php

class ModelAddTask extends Model{

    function set_data()
    {
        $name = $email = $text = '';

        if(isset($_POST['username'])) $name = sanitize($_POST['username']);
        if(isset($_POST['email'])) $email = sanitize($_POST['email']);
        if(isset($_POST['text'])) $text = sanitize($_POST['text']);

        if(empty($name) || empty($email) || empty($text)){
            return array('status' => false, 'text' => 'Одно или несколько полей не было заполнено.');
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            return array('status' => false, 'text' => 'Неверный формат почты.');
        }

        global $db;
        $table_tasks = DB_PREFIX . 'tasks';
        $add_task = "INSERT INTO {$table_tasks} (email, user, text, status) VALUES ('$email', '$name', '$text', 'new');";
        $db_result = $db->exec($add_task);

        $status = false;
        $status_text = 'Задача не была добавлена.';
        if(!empty($db_result)){
            $status = true;
            $status_text = 'Задача добавлена успешно';
        }

        return array('status' => $status, 'text' => $status_text);
    }
}