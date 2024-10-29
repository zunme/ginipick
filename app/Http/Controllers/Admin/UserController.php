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
        $data = User::with('memos')->select('*')->where('userid','<>','zunme');
        if( $request->search_type && $request->search_str ) $data->where( $request->search_type ,'like','%'.$request->search_str.'%' );
        $data->orderBy('id','desc');
        return $data->paginate( 10 );
    }
    public function show($id){
        return  User::with(['memos.writeuser'=>function ($q){ $q->select('id','userid','name','tel');}])->findOrFail( $id);
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
        return ['code'=>'OK'];
    }
    public function update(Request $request, $id){
        $req = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'tel' => ['required', 'numeric'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255'],
            'personality' => 'required|in:P,C',
		],[
        ],[
			'userid'=>'아이디','password'=>'비밀번호','tel'=>'전화번호','name'=>'이름'
		]);        
        try{
            $user = User::findOrFail($id);
            $user->update( $req);
        } catch( ModelNotFoundException $e){
            throw new Exception('회원정보를 찾을 수 없습니다.');
        } catch( Exception $e){
            throw new Exception('저장 중 오류가 발생하였습니다');
        }
        return $user;
    }
    public function updatePassword(Request $request, $id){
        $req = $request->validate([
            'password' => ['required', 'string', 'max:30'],
		],[
        ],[
			'password'=>'비밀번호'
		]);        

        try{
            $user = User::findOrFail($id);
            $user->password = \Hash::make( $request->password);
            $user->save();
        } catch( ModelNotFoundException $e){
            throw new Exception('회원정보를 찾을 수 없습니다.');
        } catch( Exception $e){
            throw new Exception('저장 중 오류가 발생하였습니다');
        }
        return $user;
    }
    public function storeMemo(Request $request, $id){
        $req = $request->validate([
            'memo' => ['required', 'string'],
		],[
        ],[
			'memo'=>'메모내용'
		]);   
        try{
            $user = User::findOrFail($id);
            $user->memos()->create([
                'write_user_id'=>\Auth::user()->id,
                'memo'=> $request->memo,
            ]);
        } catch( ModelNotFoundException $e){
            throw new Exception('회원정보를 찾을 수 없습니다.');
        } catch( Exception $e){
            throw new Exception('저장 중 오류가 발생하였습니다');
        }
        $user = User:: with(['memos.writeuser'=>function ($q){ $q->select('id','userid','name','tel');}])->find($id);
        return $user->memos;
    }
    public function updateRole(Request $request, $id){
        $req = $request->validate([
            'user_type' => 'required|in:admin,partner_admin,partner,user',
		],[
        ],[
			'user_type'=>'권한'
		]); 
        try{
            $user = User::findOrFail($id);
            if( $request->user_type=='user'){
                $user->syncRoles([]);
            }else{
                $user->syncRoles([$request->user_type]);
            }
            $user->user_type = $request->user_type;
            $user->save();
        } catch( ModelNotFoundException $e){
            throw new Exception('회원정보를 찾을 수 없습니다.');
        } catch( Exception $e){
            throw new Exception('저장 중 오류가 발생하였습니다');
        }
        return ['code'=>'OK'];
    }

}
