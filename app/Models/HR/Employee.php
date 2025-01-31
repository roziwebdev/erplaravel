<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
