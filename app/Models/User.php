<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'login', 'password', 'email_verified_at', 'cpf', 'security_question', 'security_answer', 'pin_code', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    function Group() {
        return $this->belongsTo(Group::class);
    }

    function ApplicationForBorrowing() {
        return $this->hasMany(Library\ApplicationForBorrowing::class);
    }
}
