<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photographerbooking extends Model
{
    use HasFactory;
    public function photographers()
    {
        return $this->belongsToMany(Photographer::class, 'ph_bookings')->withTimeStamps();
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function packages()
    {
        return $this->belongsTo(Photographerpackage::class, 'package_id');
    }
}
