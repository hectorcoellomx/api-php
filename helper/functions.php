<?php

function param($pos){
    $params = array_slice(explode('/', $_GET['route']), 1);
    return isset($params[$pos]) ? $params[$pos] : "";
}

function input($name, $type="all"){
    $value= "";
    if($type=="get" || $type=="all"){
        $value = isset($_GET['tk']) ? $_GET['tk'] : "";
    }elseif ( ($type=="post" || $type=="all") && $value=="" ) {
        $value = isset($_POST['tk']) ? $_POST['tk'] : "";
    }
    return $value;
}


