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
        return view('frontend.index', compact('product_categories'));
    }


    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function product($slug)
    {
        $product = Product::with('media', 'category', 'tags', 'reviews')->withAvg('reviews', 'rating')->whereSlug($slug)
            ->Active()->HasQuantity()->ActiveCategory()->firstOrFail();

        $relatedProducts = Product::with('firstMedia')->whereHas('category', function ($query) use ($product) {
            $query->whereId($product->product_category_id);
            $query->whereStatus(true);
        })->inRandomOrder()->Active()->HasQuantity()->take(4)->get();
        return view('frontend.product', compact('product', 'relatedProducts'));
    }

    public function shop($slug = null)
    {
        return view('frontend.shop', compact('slug'));
    }

    public function shop_tag($slug = null)
    {
        return view('frontend.shop_tag', compact('slug'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function wishlist()
    {
        return view('frontend.wishlist');
    }

}
