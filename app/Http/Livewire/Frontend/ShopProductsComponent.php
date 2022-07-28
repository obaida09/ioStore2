<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use App\Models\Tag;
use App\Models\ProductCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShopProductsComponent extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    public $paginationLimit = 15;
    public $slug;
    public $sortingBy = ['value' => 'default'];
    public $sortClass = 4;
    public $tags;
    public $sortingByTags = [];
    public $minPrice;
    public $maxPrice;


    public function mount()
    {
        $this->minPrice = 1;
        $this->maxPrice = 1000;
    }

    public function sort($itemNum) {
        if ($itemNum == 'four_items') {
            $this->sortClass = 3;
            $this->paginationLimit = 20;
        }else {
            $this->sortClass = 4;
            $this->paginationLimit = 15;
        }
    }

    public function addToCart($id)
    {
        $product = Product::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();
        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });
        if ($duplicates->isNotEmpty()) {
            $this->alert('error', 'Product already exist!');
        } else {
            Cart::instance('default')->add($product->id, $product->name, 1, $product->price)->associate(Product::class);
            $this->emit('updateCart');
            $this->alert('success', 'Product added in your cart successfully.');
        }
    }

    public function addToWishList($id)
    {
        $product = Product::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();
        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });
        if ($duplicates->isNotEmpty()) {
            $this->alert('error', 'Product already exist!');
        } else {
            Cart::instance('wishlist')->add($product->id, $product->name, 1, $product->price)->associate(Product::class);
            $this->emit('updateCart');
            $this->alert('success', 'Product added in your wishlist cart successfully.');
        }
    }

    public function render()
    {
        $products = Product::with('firstMedia');
        $sortingByTags = $this->sortingByTags;

        switch ($this->sortingBy['value']) {
            case 'popularity':
                $sort_field = 'id';
                $sort_type = 'asc';
                break;
            case 'low-high':
                $sort_field = 'price';
                $sort_type = 'asc';
                break;
            case 'high-low':
                $sort_field = 'price';
                $sort_type = 'desc';
                break;
            default:
                $sort_field = 'id';
                $sort_type = 'asc';
        }

        if ($this->slug == '') {
            $products = $products->ActiveCategory();
        } else {
            $product_category = ProductCategory::with('tags')->whereSlug($this->slug)->whereStatus(true)->first();
            $this->tags = $product_category->tags;

            if (is_null($product_category->parent_id)) {
                $categoriesIds = ProductCategory::whereParentId($product_category->id)
                    ->whereStatus(true)->pluck('id')->toArray();

                $products = $products->whereHas('category', function ($query) use ($categoriesIds) {
                    $query->whereIn('id', $categoriesIds);
                });

            } else {
                $products = $products->with('category', 'tags')->whereHas('category', function ($query) {
                    $query->where([
                        'slug' => $this->slug,
                        'status' => true
                    ]);
                });
            }
        }

        if (count($sortingByTags) > 0) {
            $products = $products->whereHas('tags', function ($query) use ($sortingByTags) {
                $query->whereIn('tag_id', $sortingByTags);
            });
        }

        $products = $products->Active()
            ->HasQuantity()
            ->orderBy($sort_field, $sort_type)
            ->whereBetween('price', [$this->minPrice, $this->maxPrice])
            ->paginate($this->paginationLimit);

        return view('livewire.frontend.shop-products-component', [
            'tags' => $this->tags,
            'products' => $products,
        ]);
    }
}
