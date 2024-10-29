<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Contact;


class ContactController extends Controller
{
    public function list(Request $request){
        $data = Contact::with(['user']);
        if( $request->search_type && $request->search_str ) $data->where( $request->search_type ,'like','%'.$request->search_str.'%' );
        $data->orderBy('id','desc');
        return $data->paginate( 10 );
    }
    public function store(Request $request){
        $req = $request->validate([
            'company'=> 'required|string',
            'name'=> 'required|string',
            'position'=> 'nullable|string',
            'tel'=> 'required|numeric',
            'email'=> 'required|email',
            'service_type'=> 'required|string',
            'content'=> 'required|string',
            'agree'=> 'required|in:Y',
		],[
            "company.*"=>'기업명을 입력해주세요',
            "name.*"=>'이름을 입력해주세요',
            "tel.*"=>'연락처(숫자만)를 입력해주세요',
            "email.*"=>'올바른 이메일을 입력해주세요',
            "position.*"=>'직책 입력해주세요',
            "service_type.*"=>'서브시를 선택해주세요',
            "content.*"=>'문의내용을 입력해주세요',
            "agree.*"=>'개인정보 수집 및 처리방침 동의가 필요합니다.',
		],[
        ]);
        try{
            $req['user_id'] = \Auth::user() ? \Auth::user()->id : null;
            Contact::create($req);
        }catch( Exception $e){
            throw new Exception( '저장 중 오류가 발생하였습니다.' );
        }
    }
    public function updateStatus(Request $request, $id){
        $req = $request->validate([
            'c_type'=> 'required|in:write,read,progress,done',
		],[
		],[
            "c_type"=>'상태',
        ]);
        $contract = Contact::findOrFail($id);
        $contract->c_type = $request->c_type;
        $contract->save();
        return ['code'=>'OK'];
    }
}
