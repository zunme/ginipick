<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Models\CheckplusLog;
use App\Models\User;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $req = $request->validate([
			'userid'=> 'required|unique:users|lowercase|alpha_num:ascii|min:5|max:15',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => ['required', 'string', 'max:100'],
            'tel' => ['required', 'numeric'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'user_type' => 'required|in:P,C',
            'agree_personal' => 'required|in:Y',
            'agree_terms' => 'required|in:Y',
		],[
            'agree_personal.*'=>'[이용약관]에 동의해주세요',
            'agree_terms.*'=>'[개인정보 수집 및 이용]에 동의해주세요',
        ],[
			'userid'=>'아이디','password'=>'비밀번호','tel'=>'전화번호','name'=>'이름'
		]);
        if(  config("site.use_tel_verify") ){
            if( !$request->auth_id) return $this->errormsg('tel', '핸드폰 인증을 해주세요.');
            $chkplus = CheckplusLog::find($request->auth_id);
            if(!$chkplus) return $this->errormsg('tel', '인증정보를 찾을 수 없습니다.');
            if ( $chkplus->user_id ) return $this->errormsg('tel', '올바른 인증정보를 찾을 수 없습니다.');
            if ( $chkplus->created_at < now()->subDay() ) return $this->errormsg('tel', '인증시간이 초과되었습니다.');
            $req['checkplus_log_id']=$chkplus->id;
        }
        $ban = config('site.disable_userid_str');
        foreach( $ban as $banitem){
            if( \Str::contains($request->userid, $banitem ) ) {
                $validator = \Validator::make([], []);
                $validator->getMessageBag()->add('userid', "{$banitem} 은(는) 포함할 수 없는 단어입니다.");  
                return \Redirect::back()->withErrors($validator)->withInput();
            }     
            if( \Str::contains($request->name, $banitem ) ) {
                $validator = \Validator::make([], []);
                $validator->getMessageBag()->add('name', "{$banitem} 은(는) 포함할 수 없는 단어입니다.");  
                return \Redirect::back()->withErrors($validator)->withInput();
            }          
        }
        $ban = config('site.disable_username_str');
        foreach( $ban as $banitem){
            if( \Str::contains($request->name, $banitem ) ) {
                $validator = \Validator::make([], []);
                $validator->getMessageBag()->add('name', "{$banitem} 은(는) 포함할 수 없는 단어입니다.");  
                return \Redirect::back()->withErrors($validator)->withInput();
            }          
        }

        $req['password'] = Hash::make($request->password);
        $user = User::create($req);
        try{
            $chkplus->user_id = $user->id;
            $chkplus->save();
        }catch( \Exception $e){
            ;
        }
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
    protected function errormsg( $key, $message){
        $validator = \Validator::make([], []);
        $validator->getMessageBag()->add( $key , $message );  
        return \Redirect::back()->withErrors($validator)->withInput();
    }
}
