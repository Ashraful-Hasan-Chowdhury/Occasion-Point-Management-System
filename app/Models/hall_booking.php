<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hall_booking extends Model
{
    use HasFactory;
    public function halls()
    {
        return $this->belongsToMany(Hall::class, 'hall_hallbookings')
            ->withTimeStamps();
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
