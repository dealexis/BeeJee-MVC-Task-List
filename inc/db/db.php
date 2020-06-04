<?php

require_once 'inc/db/db_config.php';

$db_options = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);


try {
    $table_tasks = DB_PREFIX . 'tasks';
    $db = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_HOST_USERNAME, DB_HOST_PASSWORD, $db_options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $create_table_tasks = "CREATE TABLE IF NOT EXISTS {$table_tasks}( 
        id INT NOT NULL AUTO_INCREMENT ,
        email VARCHAR(45) NOT NULL ,
        user VARCHAR(25) NOT NULL ,
        text TEXT NOT NULL ,
        status VARCHAR(10) NOT NULL ,
        PRIMARY KEY  (id));";
    $db->exec($create_table_tasks);
} catch (Exception $ex) {
    echo $ex->getMessage();
    die;
}
