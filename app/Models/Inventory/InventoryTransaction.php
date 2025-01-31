<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
