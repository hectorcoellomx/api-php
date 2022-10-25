<?php

function param($pos){
    $params = array_slice(explode('/', $_GET['route']), 1);
    return isset($params[$pos]) ? $params[$pos] : "";
}

function route($route, $method){
    return ($route == $_GET['route'] && strtolower($_SERVER['REQUEST_METHOD']) == $method);
}

