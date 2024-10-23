<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'userid' => ['required', 'string'],
            'password' => ['required'],
        ]);
        $user = User::where( 'userid', $credentials['userid'])->first();
        if( !$user ) {
            return back()->withErrors([
                'userid' => '아이디/비밀번호를 확인해주세요.',
            ])->onlyInput('userid');
        }else if( !in_array ($user->user_type ,['admin','superadmin'])){
            $credentials['domain_group_id'] = '1';
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
            /*
            if( $request->user()->can('adminPerm') ){
                return redirect('/djemals');
            }else return redirect('/');
            */
        }else{
            return back()->withErrors([
                'userid' => '아이디/비밀번호를 확인해주세요.',
            ])->onlyInput('userid');
        }
    }
    public function store_(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
