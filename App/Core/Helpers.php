<?php

function debug($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function sanitize($var){
    return preg_replace('/[!#$%^&*()<>{}\[\]]/', '', trim(strip_tags(stripslashes(htmlspecialchars($var)))));
}