<?php

use Floxie\Models\Product\ProductService;

class ProductController {

    public function index() {
        $products = ProductService::index();
        Response::json($products);
    }

    public function show($id) {
        $product = ProductService::show($id);
        Response::json($product);
    }

}
