<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class FrontendController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategory::whereStatus(1)->whereNull('parent_id')->get();
        // $featuerd_products = Product::with('firstMedia')->inRandomOrder()->scopeFeatured()->scopeActive()->scopeHasQuantity()->scopeActiveCategory()->take(8)->get();
        $featuerd_products = Product::with('media')->inRandomOrder()->take(8)->get();
        return view('frontend.index', compact('product_categories', 'featuerd_products'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function detail()
    {
        return view('frontend.product');
    }

    public function shop()
    {
        return view('frontend.shop');
    }
}
