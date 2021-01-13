<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall_payment extends Model
{
    use HasFactory;
    public function owners()
    {
        return $this->belongsToMany(Hallowner::class, 'hallowner_payments')->withTimeStamps();
    }
}
