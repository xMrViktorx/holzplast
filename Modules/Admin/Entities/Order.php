<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'total_price', 'pickup'];

    /**
     * Get the order_items record associated with the order.
     */
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function billing_address()
    {
        return $this->hasOne(BillingAddress::class);
    }

    public function shipping_address()
    {
        return $this->hasOne(ShippingAddress::class);
    }
}
