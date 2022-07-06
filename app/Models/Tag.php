<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }
}
