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

use App\Classes\Checkplus;
use App\Models\CheckplusLog;


class UserController extends Controller
{
    public function checkId( Request $request){
        $req = $request->validate([
			'userid'=> 'required|unique:users|lowercase|alpha_num:ascii|min:5|max:15',
		],[
        ],[
			'userid'=>'아이디','password'=>'비밀번호','tel'=>'전화번호',
		]);
        $ban = config('site.disable_userid_str');
        foreach( $ban as $banitem){
            if( \Str::contains($request->userid, $banitem ) ) {
                abort(422, "{$banitem}은(는) 사용할 수 없는 단어입니다.");
            }            
        }

        return ['code'=>'OK'];
    }
    public function hpcert(Request $request){
        $checkplus = new Checkplus();
        $data = $checkplus->getEnc();

        if( config('site.use_tel_verify') !== true || $data['enc_data'] == '') {
            echo('<div style="text-align:center; font-size:18px; color:#999; font-weight:600;margin-top:40vw;">준비중 입니다.</div>');
            return;
        }
        return view('front.hpcert', $data);
    }

    public function getHpVerified(Request $request) {
        $req_seq = $request->session()->get('REQ_SEQ');
        $log = null;
        if( $req_seq ){
            $log = CheckplusLog::
                select('id','mobileno','name','dupinfo')
                ->where(['requestnumber'=>$req_seq])->whereNull('etc')->orderBy('id','desc')->first();
            if( $log ) {
                $dup = CheckplusLog::where( ['dupinfo' => $log->dupinfo ])
                    ->where( 'id', '!=', $log->id)
                    ->where( 'user_id','>',0 )
                    ->count();
                if( $dup > 0 ) abort(422, '이미 가입하신 기록이 있습니다.');
                return $this->success(['log'=>$log,'sid'=>$request->session()->get('REQ_SEQ')]);
            }
            else abort( 422, '인증 정보를 찾을 수 없습니다.');
        }else return $this->success(['log'=>$log,'sid'=>$request->session()->get('REQ_SEQ')]);
    }
    public function checkPlusResult(Request $request, $result) {
        /*
        $data = ' {"res":"success","req":{"EncodeData":"AgAFQ0I1MzCiL9DyBSAUiyxVvYpdI1nPlcuC/Axe+IbTbG+4yaqeb+noJmKCKbEDy/BIu4Q+/y8f+UDXA1YELBVSgIwRwgEgiqagpXtmcip7JC4rJjI/Yy6oQlda7Iai0yj+GDuztAZYvPUnG0TfvIk2BL6Q73vzsDFfNw2TfCGPdaKXXQmsORsLELA7xuETGHLQcIeYTHhv7d562vI7Bsg+40VQ1xoeH4Era4RkmVAA3Xt+yBlRV3Fag0Tk+ce3qUfoVBhUGfWmuv0VERn78GxZrQ0fKMooVNsqAcGe7ByY+7L2GOs8WWMFtK2ZvYBH1Qnrd0B82Y4huBaNSSd9jnv+XMCRM0jzWJ6Lw9Ub89qONnhRc4vvJPRuig9UpQ965GFV39B10eF8pHkOyvRUzGEgeWLhI2l2WBEOC4YcA1Ags8Fnafpp9s7Fgy4EO0fekIemDOKIIxBPFLnG7KLrNLpjSQr85x/S81fpO9ljhsj7MX2tN2smunHkgyEvEcYk7DzcJ7Bd2w4Ly2N/07MiB6oByq0w5MwOUrX8gZB7G43tPAEWfKXwhRd//PEdWVMtTE0rCrzd/B4z822LrcBp6rSeSZ7/5guPB6spnCmNLdpTfLzFkm00gQ=="}}';
        $data =  json_decode($data, true) ;
        $request['EncodeData'] = $data['req']['EncodeData'];
        */

        \Log::info('checkplus', ['res'=>$result, 'req'=>$request->all()]);

        try{
            if( $result == 'success'){
                
                $checkplus = new Checkplus();
                $checkdata = $checkplus->getDesc( $request );
                $callData = ['type'=>'checkplus', 'data'=>['msg'=>'핸드폰 인증을 완료하였습니다.','success'=>'OK',] ];
            }else{
                $callData = ['type'=>'checkplus','data'=>['msg'=>'핸드폰 인증이 되지 않았습니다.','success'=>'ERROR'] ];    
            }
        }catch(\Exception $e){
            $callData = ['type'=>'checkplus','data'=>['msg'=>$e->getMessage(),'success'=>'ERROR'] ];
        }
        return view('front.hpcertclose', compact(['callData']));
    }
    protected function success($data=[], $message = null, $code = 200)
    {
      return response()
        ->json($data, $code,['Pragma'=> 'no-cache','Cache-Control'=> 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0']);
    }
}
