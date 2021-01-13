<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographerpackage extends Model
{
    use HasFactory;
    public function photographers()
    {
        return $this->belongsToMany(Photographer::class, 'ph_packages')->withTimeStamps();
    }
    public function bookings()
    {
        return $this->hasOne(photographerbooking::class);
    }
}
