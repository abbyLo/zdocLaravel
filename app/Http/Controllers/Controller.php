<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function response($data=[], $message='')
    {
        $response = [
            'data'    => $data,
            'message' => $message,
            'status' => 'success',
            'code' => '0000',
        ];

        return response()->json($response);
    }

    public function errorResponse($data=[], $code=9999, $message='', $param = [])
    {   
        if($code != '9999' ){
            // $systemCodeModel = new SystemCode();
            // $message = $systemCodeModel->codeMsg($code);
            if (count($param) > 0) {
                $message = vsprintf($message, $param);
            }
        }
        $response = [
            'data'    => $data,
            'message' => $message,
            'status' => 'fail',
            'code' => strval($code)
        ];

        return response()->json($response, 400);
    }
}
