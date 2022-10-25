<?php 

namespace App\Controllers;

require './models/Product.php';

use App\Config\Response;
use App\Models\Product;

class ProductController{
    

    public function index(){
        
        $product = new Product();
        $data = $product->list();

        echo json_encode(Response::status200(true, $data));
        //echo json_encode(Response::status200(false, 101));
        //echo json_encode(Response::error(400, null, "Invalid path"));
        //echo json_encode(Response::error(401, 1, "0000"));
        //echo json_encode(Response::error(500));
    }

    public function show($id){
        
        $product = new Product();
        $data = $product->single($id);

        echo json_encode(Response::status200(true, $data));
    }

    public function store(){
        
        $product = new Product();
        $data = $product->create();

        echo json_encode(Response::status200(true, $data));
    }

    public function update(){
        
        $product = new Product();
        $data = $product->edit();

        echo json_encode(Response::status200(true, $data));
    }

    public function destroy(){
        
        $product = new Product();
        $data = $product->delete();

        echo json_encode(Response::status200(true, $data));
    }


}




?>