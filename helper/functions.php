<?php

function param($pos){
    $params = array_slice(explode('/', $_GET['route']), 1);
    return isset($params[$pos]) ? $params[$pos] : "";
}


