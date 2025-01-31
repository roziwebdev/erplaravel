<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function salesOrders()
    {
        return $this->hasMany(SalesOrder::class);
    }
}
