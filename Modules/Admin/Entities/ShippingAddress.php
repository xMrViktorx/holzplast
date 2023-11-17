<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'first_name', 'last_name', 'company', 'email', 'phone', 'country', 'city',  'postcode', 'address', 'house_number'];
}
