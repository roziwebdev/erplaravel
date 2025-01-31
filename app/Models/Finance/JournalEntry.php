<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
