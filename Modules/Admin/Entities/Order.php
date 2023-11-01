<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_country', 'customer_address', 'customer_postcode', 'customer_email', 'customer_phone', 'status', 'total_price'];

    /**
     * Get the order_items record associated with the order.
     */
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
