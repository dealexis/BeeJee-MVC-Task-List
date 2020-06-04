<?php

class ModelMain extends Model{
    public function get_data()
    {

        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $tasks_per_page = 3;
        $offset = ($page-1) * $tasks_per_page;

        $tasks = '';
        global $db;
        $table_tasks = DB_PREFIX . 'tasks';
        $task_sql_total = $db->query("SELECT COUNT(id) FROM $table_tasks")->fetch()['COUNT(id)'];
        $total_pages = ceil($task_sql_total / $tasks_per_page);

        if(!empty($_GET['sorting'])){
            //here could be wrap in a function but im lazy
            switch ($_GET['sorting']){
                case 'name_up':
                    $task_sql = $db->query("SELECT * FROM $table_tasks ORDER BY user ASC LIMIT $offset, $tasks_per_page")->fetchAll();
                    break;
                case 'name_down':
                    $task_sql = $db->query("SELECT * FROM $table_tasks ORDER BY user DESC LIMIT $offset, $tasks_per_page")->fetchAll();
                    break;
                case 'email_up':
                    $task_sql = $db->query("SELECT * FROM $table_tasks ORDER BY email ASC LIMIT $offset, $tasks_per_page")->fetchAll();
                    break;
                case 'email_down':
                    $task_sql = $db->query("SELECT * FROM $table_tasks ORDER BY email DESC LIMIT $offset, $tasks_per_page")->fetchAll();
                    break;
                case 'status_up':
                    $task_sql = $db->query("SELECT * FROM $table_tasks ORDER BY status ASC LIMIT $offset, $tasks_per_page")->fetchAll();
                    break;
                case 'status_down':
                    $task_sql = $db->query("SELECT * FROM $table_tasks ORDER BY status DESC LIMIT $offset, $tasks_per_page")->fetchAll();
                    break;
            }
        }else{
            $task_sql = $db->query("SELECT * FROM $table_tasks LIMIT $offset, $tasks_per_page")->fetchAll();
        }

        if(empty($task_sql)){
            return 'Нет ни одной добавленной задачи';
        }

        return array(
            'tasks' => $task_sql,
            'total_pages' => $total_pages,
            'page' => $page,
            );
    }
}