<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest; // 142pページで追加
use Validator; // 144ページで追加
    class HelloController extends Controller
    {
        public function index(Request $request) {
            return view('hello.index',['msg'=>'フォームを入力して下さい。']);
        }

        public function post(HelloRequest $request) {
            return view('hello.index',['msg'=>'正しく入力されました']);
        }
    }