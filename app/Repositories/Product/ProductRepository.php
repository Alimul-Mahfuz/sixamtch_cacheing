<?php

namespace App\Repositories\Product;

use App\Contracts\ProductDbContract;
use App\Models\Product;

class ProductRepository implements ProductDbContract
{

    function getPaginatedProducts(): \Illuminate\Pagination\LengthAwarePaginator
    {
        return Product::query()->orderBy('id','DESC')->paginate(15);
    }

    function getProductById($id)
    {
        return Product::query()->findOrFail($id);
    }

    function getProductCount(): int
    {
        return Product::query()->count();
    }
}
