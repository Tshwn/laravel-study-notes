<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest; // 142pページで追加
use Illuminate\Foundation\Validation\ValidatesRequests; //165ページで追加
use Validator; // 144ページで追加
    class HelloController extends Controller
    {
        use ValidatesRequests;//165ページで追加
        //これがないとvalidate()メソッドが使えない

        public function index(Request $request) {
            if($request->hasCookie('msg')) {
                $msg = 'Cookies: ' . $request->cookie('msg');
            } else {
                $msg ='※クッキーはありません。';
            }
            return view('hello.index',['msg'=>$msg]);
        }

        public function post(Request $request) {
            $validate_rule = [
                'msg' => 'required',
            ];
            $this->validate($request,$validate_rule);
            $msg = $request->msg;
            $response = response()->view('hello.index',
            [
                'msg' => '「' . $msg . '」をクッキーに保存しました。',
            ]);
            $response->cookie('msg', $msg, 100);
            return $response;
        }
    }