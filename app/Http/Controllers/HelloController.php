<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

    class HelloController extends Controller
    {
        public function index(Request $request) {
            return view('hello.index',['msg'=>'フォームを入力: ']);
        }

        public function post(Request $request) {
            $validate_rule = $request->validate([ //$request->validate([配列でvalidate])は新しい書き方。もともとは変数名 = [];で、下の$this->validateだった。
                'name' => 'required',
                'mail' => 'email',
                'age' => 'numeric|between:0,150',
            ]);
            // $this->validate($request,$validate_rule);古い書き方
            return view('hello.index',['msg'=>'正しく入力されました']);
        }
    }