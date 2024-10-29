<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qna extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'q_type','q','a','sort_no'
    ];
    //
}
