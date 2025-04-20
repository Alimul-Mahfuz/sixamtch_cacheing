<?php

namespace App\Contracts;

interface ProductDbContract
{
    function getPaginatedProducts();
    function getProductById($id);

    function getProductCount();
}
