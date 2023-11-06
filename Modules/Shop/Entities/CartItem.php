<?php

namespace Modules\Shop\Entities;

use Modules\Admin\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id', 'cart_id', 'quantity', 'item_price', 'total_price'];

    /**
     * Get the product record associated with the cart item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
