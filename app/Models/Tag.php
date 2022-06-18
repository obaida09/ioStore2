<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'name'
    //         ]
    //     ];
    // }

    protected $searchable = [
        'columns' => [
            'tags.name' => 10,
        ]
    ];

    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }
}
