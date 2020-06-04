<?php

Class ModelLogin extends Model
{

    function set_data()
    {
        //login user or logout
        $admin = array('name' => 'admin', 'password' => 123);
        $data = array('response' => '');
        $name = sanitize($_POST['name']);
        $password = $_POST['password'];

        if (empty($name) || empty($password)) {
            $data['response'] = 'Заполните все поля.';
            return $data;
        }

        if ($name == $admin['name'] && $password == $admin['password']) {

            $_SESSION['logged_in'] = true;
            if (isset($_SESSION['logged_in'])) {
                header('Location: /');
            }
            $data['response'] = 'Добро пожаловать.';
            return $data;
        } else {
            $data['response'] = 'Такого пользователя не существует.';
            return $data;
        }

    }
}