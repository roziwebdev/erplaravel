<?php

namespace App\Models\Purchasing;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

}
