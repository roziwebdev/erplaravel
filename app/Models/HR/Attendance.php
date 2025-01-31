<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
