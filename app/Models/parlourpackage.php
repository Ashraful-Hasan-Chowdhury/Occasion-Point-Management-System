<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parlourpackage extends Model
{
    use HasFactory;
    public function parlours()
    {
        return $this->belongsToMany(Parlour::class, 'par_packages')
            ->withTimeStamps();
    }
    public function bookings()
    {
        return $this->hasOne(parlourbooking::class);
    }
}
