<?php

namespace App\Models\Purchasing;

use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
