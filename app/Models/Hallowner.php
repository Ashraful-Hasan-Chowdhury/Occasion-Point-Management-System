<?php

namespace App\Models;

use App\Notifications\Hallowner\HallownerResetPassword;
use App\Notifications\Hallowner\HallownerVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hallowner extends Authenticatable
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
        $this->notify(new HallownerResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new HallownerVerifyEmail);
    }
    public function halls()
    {
        return $this->belongsToMany(Hall::class, 'halladmin_halls')->withTimeStamps();
    }
    public function payments()
    {
        return $this->belongsToMany(Hall_payment::class, 'hallowner_payments')->withTimeStamps();
    }
}
