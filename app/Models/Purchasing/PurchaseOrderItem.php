<?php

namespace App\Models\Purchasing;

use App\Models\Inventory\Product;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
