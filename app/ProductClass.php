<?php

namespace App;

use App\Service\Repository;
use App\Product;


class ProductClass implements Repository
{
    public function store($request)
    {
        $product = Product::create($request->validated());
        return $product;
        # code...
    }

    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) return response(null, 204);
    }   

}