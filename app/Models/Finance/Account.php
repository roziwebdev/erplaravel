<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
     public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function journalEntries()
    {
        return $this->hasMany(JournalEntry::class);
    }
}
