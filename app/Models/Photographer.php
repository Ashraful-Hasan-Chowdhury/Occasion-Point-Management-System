<?php

namespace App\Models;

use App\Notifications\Photographer\PhotographerResetPassword;
use App\Notifications\Photographer\PhotographerVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Photographer extends Authenticatable
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
        $this->notify(new PhotographerResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new PhotographerVerifyEmail);
    }
    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'photographer_portfolios')->withTimeStamps();
    }
    public function packages()
    {
        return $this->belongsToMany(Photographerpackage::class, 'ph_packages')->withTimeStamps();
    }
    public function bookings()
    {
        return $this->belongsToMany(photographerbooking::class, 'ph_bookings')->withTimeStamps();
    }
    public function payments()
    {
        return $this->belongsToMany(photographerpayment::class, 'ph_payments')->withTimeStamps();
    }
    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'photographer_reviews')
            ->withTimeStamps();
    }
}
