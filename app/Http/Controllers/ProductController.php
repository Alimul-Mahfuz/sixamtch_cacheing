<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    function __construct(
        protected ProductService $productService,
    )
    {
    }

    function index()
    {
        $products = $this->productService->getPaginatedProducts();
        return view('index', compact('products'));
    }

    function showNoCache($id)
    {

        $start = microtime(true);
        $productCount = $this->productService->getNumberOfProducts();
        $product = $this->productService->getProductById($id);
        $price = (float)$product->price;
        $discount = (float)$product->discount;
        $finalPrice = max($price - $discount, 0);
        $discountPercent = $price > 0 ? round(($discount / $price) * 100) : 0;
        $product->final_price=$finalPrice;
        $product->discount_percent=$discountPercent;
        $product->category=$product->category->name;
        $product->price=$price;
        $fetch_time = round(microtime(true) - $start, 5);
        return view('product.show', compact('product', 'productCount', 'fetch_time'));
    }

    function showWithCache($id){

        $start = microtime(true);

        $productCount = Cache::remember('product_count', 3600, function () {
            return $this->productService->getNumberOfProducts();

        });

        $cache_key = "product_custom_data_{$id}";

        $product = Cache::remember($cache_key, 3600, function () use ($id) {
            $product = $this->productService->getProductById($id);

            $price = (float)$product->price;
            $discount = (float)$product->discount;
            $finalPrice = max($price - $discount, 0);
            $discountPercent = $price > 0 ? round(($discount / $price) * 100) : 0;

            return (object)[
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'description' => $product->description,
                'image' => $product->image,
                'price' => $price,
                'discount' => $discount,
                'final_price' => $finalPrice,
                'discount_percent' => $discountPercent,
                'stock_count' => $product->stock_count,
                'view_count' => $product->view_count,
                'category' => $product->category->name,
            ];
        });

        $fetch_time = round(microtime(true) - $start, 5);
        return view('product.show', compact('product', 'productCount', 'fetch_time'));

    }
}
