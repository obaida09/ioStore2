<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;

class FeaturedProducts extends Component
{
    public function render()
    {
        return view('livewire.frontend.featured-products', [
            'featuerd_products' => Product::with('media')->take(8)->get()
        ]);
    }
}
