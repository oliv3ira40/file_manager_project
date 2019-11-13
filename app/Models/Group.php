<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
    	'name',
    ];



    function User() {
    	return $this->hasMany(User::class);
    }

    function Permission() {
    	return $this->hasMany(Permission::class);
    }
}
