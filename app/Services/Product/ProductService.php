<?php

namespace App\Services\Product;

use App\Contracts\ProductDbContract;

class ProductService
{
    function __construct(protected ProductDbContract $productRepository){

    }
    function getPaginatedProducts(){
        return $this->productRepository->getPaginatedProducts();
    }

    function getProductById(int $id){
        return $this->productRepository->getProductById($id);
    }

    function getNumberOfProducts(){
        return $this->productRepository->getProductCount();
    }
}
