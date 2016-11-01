<?php

use Floxie\Models\Product;

class ProductController {

    public function index() {
        Response::json(new Product());
    }

    public function show($id) {

    }

}
