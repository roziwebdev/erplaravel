<?php

namespace App\Models\Purchasing;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseOrderItems()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function goodsReceipts()
    {
        return $this->hasMany(GoodsReceipt::class);
    }

    public function purchaseInvoice()
    {
        return $this->hasOne(PurchaseInvoice::class);
    }
}
