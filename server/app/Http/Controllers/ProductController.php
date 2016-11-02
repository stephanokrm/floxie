<?php

use Floxie\Models\Product\ProductService;

class ProductController {

    public function index() {
        $products = ProductService::seed();
        Response::json($products);
    }

    public function show($id) {
        
    }

}
