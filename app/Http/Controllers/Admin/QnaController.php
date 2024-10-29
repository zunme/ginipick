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

use App\Models\Qna;


class QnaController extends Controller
{
    public function list(Request $request){
        $data = Qna::select('*');
        if( $request->search_type && $request->search_str ) $data->where( $request->search_type ,'like','%'.$request->search_str.'%' );
        $data->orderBy('sort_no','asc')->orderBy('id','desc');
        return $data->paginate( 10 );
    }
    public function store(Request $request){
        $req = $request->validate([
            'q_type' => ['required', 'string','max:20'],
            'q' => ['required', 'string'],
            'a' => ['required', 'string'],
            'sort_no' => ['nullable', 'integer'],
		],[
        ],[
			'q_type'=>'질문타입', 'q'=>'질문','a'=>'답변','sort_no'=>'정렬순서'
		]);
        try{
            Qna::create($req);
        }catch( Exception $e){
            throw new Exception( '저장 중 오류가 발생하였습니다.' );
        }
    }
}
