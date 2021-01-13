<?php

namespace App\Models;

use App\Notifications\Parlour\ParlourResetPassword;
use App\Notifications\Parlour\ParlourVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parlour extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ParlourResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new ParlourVerifyEmail);
    }
    public function packages()
    {
        return $this->belongsToMany(parlourpackage::class, 'par_packages')->withTimeStamps();
    }
    public function bookings()
    {
        return $this->belongsToMany(parlourbooking::class, 'par_bookings')
            ->withTimeStamps();
    }
    public function payments()
    {
        return $this->belongsToMany(parlourpayment::class, 'par_payments')
            ->withTimeStamps();
    }
    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'parlour_reviews')
            ->withTimeStamps();
    }
}
