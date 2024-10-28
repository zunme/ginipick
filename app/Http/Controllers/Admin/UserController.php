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
        return $data->paginate(2,['*'], 'userlist' );
    }
}
