<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parlourbooking extends Model
{
    use HasFactory;
    public function parlours()
    {
        return $this->belongsToMany(Parlour::class, 'par_bookings')
            ->withTimeStamps();
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function packages()
    {
        return $this->belongsTo(parlourpackage::class, 'package_id');
    }
}
