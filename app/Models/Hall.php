<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;
    public function owners()
    {
        return $this->belongsToMany(Hallowner::class, 'halladmin_halls')->withTimeStamps();
    }
    public function bookings()
    {
        return $this->belongsToMany(hall_booking::class, 'hall_hallbookings')->withTimeStamps();
    }
    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'hall_reviews')
            ->withTimeStamps();
    }
}
