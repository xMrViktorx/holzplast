<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'status', 'sort_in_category', 'sort_in_landing', 'description', 'parent_category_id', 'iso', 'price', 'amount', 'category_id'];

    public function productImage()
    {
        return $this->hasOne(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
