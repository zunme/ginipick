<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckplusLog extends Model
{
    protected $fillable = [
        'authtype','conninfo','dupinfo','etc','gender','ip','mobileco','mobileno','name','nationalinfo',
        'requestnumber','responsenumber','user_id','domain_group_id',
        'guest_key',
	];
    protected $hidden=[
        'dupinfo'
    ];
}
