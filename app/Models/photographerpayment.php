<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photographerpayment extends Model
{
    use HasFactory;
    public function photographers()
    {
        return $this->belongsToMany(Photographer::class, 'ph_payments')->withTimeStamps();
    }
}
