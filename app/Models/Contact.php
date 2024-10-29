<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id','company','name','position','tel','email','service_type','c_type','content'
    ];
    public function user(){
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
    protected $appends = ['status_label'];
    public function getStatusLabelAttribute(){
        $status = [
            'write'=>'신규문의',
            'read'=>'읽음',
            'progress'=>'처리중',
            'done'=>'처리완료'
        ];
        return isset( $status[$this->c_type]) ? $status[$this->c_type] : $this->c_type;
    }
}
