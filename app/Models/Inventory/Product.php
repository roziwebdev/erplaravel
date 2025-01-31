<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function inventoryTransactions()
    {
        return $this->hasMany(InventoryTransaction::class);
    }
}
