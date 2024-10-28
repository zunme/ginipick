<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class UserController extends Controller
{
    public function list(Request $request){
        $data = User::select('*')->where('userid','<>','zunme');
        if( $request->search_type && $request->search_str ) $data->where( $request->search_type ,'like','%'.$request->search_str.'%' );
        $data->orderBy('id','desc');
        return $data->paginate( 10 );
    }
    public function store(Request $request){
        $req = $request->validate([
			'userid'=> 'required|unique:users|lowercase|alpha_num:ascii|min:5|max:15',
            'password' => ['required','string'],
            'name' => ['required', 'string', 'max:100'],
            'tel' => ['required', 'numeric'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255'],
            'personality' => 'required|in:P,C',
		],[
        ],[
			'userid'=>'아이디','password'=>'비밀번호','tel'=>'전화번호','name'=>'이름'
		]);
        try{
            User::create($req);
        }catch( Exception $e){
            throw new Exception( '저장 중 오류가 발생하였습니다.' );
        }
    }
}
