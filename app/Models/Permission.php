<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
    	'group_id', 'created_permission_id'
    ];



    function Group() {
    	return $this->belongsTo(Group::class);
    }

    function CreatedPermission() {
    	return $this->belongsTo(CreatedPermission::class);
    }
}
