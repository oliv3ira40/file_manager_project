<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreatedPermission extends Model
{
    protected $fillable = [
		'name', 'route',
	];



	function Permission() {
    	return $this->hasMany(Permission::class);
    }
}
