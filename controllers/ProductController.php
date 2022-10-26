<?php 

namespace App\Controllers;

require './models/Product.php';

use App\Config\Response;
use App\Models\Product;

class ProductController{
    

    public static function index(){
        
        $product = new Product();
        $data = $product->list();

        return json_encode(Response::status200(true, $data));
        //echo json_encode(Response::status200(false, 101));
    }

    public static function show(){
        $id = 1;
        $product = new Product();
        $data = $product->single($id);

        return json_encode(Response::status200(true, $data));
    }

    public static function store(){
        
        $product = new Product();
        $data = $product->create();

        return json_encode(Response::status200(true, $data));
    }

    public static function update(){
        
        $product = new Product();
        $data = $product->edit();

        return json_encode(Response::status200(true, $data, "Se ha actualizado correctamente"));
    }

    public static function destroy(){
        
        $product = new Product();
        $data = $product->delete();

        return json_encode(Response::status200(true, $data, "Se ha eliminado correctamente"));
    }


}




?>