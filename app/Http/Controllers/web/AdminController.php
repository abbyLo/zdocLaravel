<?php

namespace App\Http\Controllers\Web;

use Validator,Str,DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Administrator;


class AdminController extends Controller
{ 
    public function list($value='')
    {
        // code...
    }
    
    //show新增會員頁
    public function create($value='')
    {
        return view('index');
    }

    //AJAX新增
    public function ajaxCreate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'account' =>  'required',
            'password' =>  'required',
            'name' =>  'required',
        ],[
            'account.required'  =>  '請輸入帳號',
            'password.required'   =>  '密碼不可空白',
            'name.required'   =>  '名稱不可空白',
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                return $this->errorResponse([], '9999', $message);
            }
        }
        // $input = $request->all();
        return $this->response();
    }

}