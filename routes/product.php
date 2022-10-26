<?php

require './config/Route.php';
require './controllers/ProductController.php';

use App\Config\Response;
use App\Config\Route;
use App\Controllers\ProductController;


Route::middleware('token')->get("api/product", ProductController::index());
Route::get("api/product/" . param(1), ProductController::show());
Route::post("api/product", ProductController::store());
Route::put("api/product/" . param(1), ProductController::update());
Route::delete("api/product/" . param(1), ProductController::destroy());


echo json_encode(Response::error(400, null, "Invalid path"));
exit;

