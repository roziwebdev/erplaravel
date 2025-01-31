<?php

namespace App\Models\Purchasing;

use Illuminate\Database\Eloquent\Model;

class PaymentsToSupplier extends Model
{
    public function purchaseInvoice()
    {
        return $this->belongsTo(PurchaseInvoice::class);
    }
}
