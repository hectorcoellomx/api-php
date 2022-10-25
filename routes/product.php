<?php

require './controllers/ProductController.php';

use App\Config\Response;
use App\Controllers\ProductController;


if( route("api/product", "get") ){
    $app = new ProductController();
    return $app->index();
    exit;
}

if( route("api/product/" . param(1), "get") ){
    $app = new ProductController();
    return $app->show(param(1));
    exit;
}

if( route("api/product", "post") ){
    $app = new ProductController();
    return $app->store();
    exit;
}

if( route("api/product/" . param(1), "put") ){
    $app = new ProductController();
    return $app->update(param(1));
    exit;
}

if( route("api/product/" . param(1), "delete") ){
    $app = new ProductController();
    return $app->destroy(param(1));
    exit;
}


echo json_encode(Response::error(400, null, "Invalid path"));
exit;

