<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
     public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function salesOrderItems()
    {
        return $this->hasMany(SalesOrderItem::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
