<?php

require './config/Route.php';
require './controllers/ProductController.php';

use App\Config\Response;
use App\Config\Route;
use App\Controllers\ProductController;


Route::get("api/product", ProductController::index(), ['token']);
Route::get("api/product/" . param(1), ProductController::show(), ['token']);
Route::post("api/product", ProductController::store(), ['token']);
Route::put("api/product/" . param(1), ProductController::update(), ['token']);
Route::delete("api/product/" . param(1), ProductController::destroy(), ['token']);


echo json_encode(Response::error(400, null, "Invalid path"));
exit;

