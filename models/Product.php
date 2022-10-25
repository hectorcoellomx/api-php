<?php 

namespace App\Models;

class Product {

    public function list(){
        return array(
            array('id' => 101, 'name' => "Arroz",  'price' => 25),
            array('id' => 102, 'name' => "Tomate",  'price' => 15),
            array('id' => 103, 'name' => "Sardina",  'price' => 18),
            array('id' => 104, 'name' => "Frijol",  'price' => 10)
        );
    }

    public function single($id){
        return array('id' => $id, 'name' => "Arroz",  'price' => 25);
    }

    public function create(){
        return true;
    }

    public function edit(){
        return true;
    }

    public function delete(){
        return true;
    }

}