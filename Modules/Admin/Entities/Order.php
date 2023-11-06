<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'country', 'city',  'postcode', 'address', 'house_number', 'status', 'total_price'];

    /**
     * Get the order_items record associated with the order.
     */
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
