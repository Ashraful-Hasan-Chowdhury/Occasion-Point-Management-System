<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parlourpayment extends Model
{
    use HasFactory;
    public function parlours()
    {
        return $this->belongsToMany(Parlour::class, 'par_payments')
            ->withTimeStamps();
    }
}
