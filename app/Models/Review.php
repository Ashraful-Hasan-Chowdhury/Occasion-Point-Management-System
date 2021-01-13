<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_reviews')
            ->withTimeStamps();
    }
    public function halls()
    {
        return $this->belongsToMany(Hall::class, 'hall_reviews')
            ->withTimeStamps();
    }
    public function photographers()
    {
        return $this->belongsToMany(Photographer::class, 'photographer_reviews')
            ->withTimeStamps();
    }
    public function parlours()
    {
        return $this->belongsToMany(Parlour::class, 'parlour_reviews')
            ->withTimeStamps();
    }
}
