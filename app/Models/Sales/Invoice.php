<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class);
    }
}
