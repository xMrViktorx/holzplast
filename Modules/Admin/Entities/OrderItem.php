<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id', 'order_id', 'quantity', 'item_price', 'total_price'];

    /**
     * Get the order record associated with the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product record associated with the order item.
     */
    public function product()
    {
        return $this->morphTo(Product::class);
    }
}
