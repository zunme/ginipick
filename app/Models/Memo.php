<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memo extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $fillable = ['write_user_id','memo','etc'];
	protected $casts = [
		'etc'=>'array',
	];
	public function writeuser(){
		return $this->belongsTo(User::class, 'write_user_id', 'id');
	}
	public function memotag()
    {
        return $this->morphTo();
    }
}
