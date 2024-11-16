<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest; // 142pページで追加
use Illuminate\Foundation\Validation\ValidatesRequests; //165ページで追加
use Validator; // 144ページで追加
use Illuminate\Support\Facades\DB; // 192ページで追加
use App\Models\Person;
use Illuminate\Support\Facades\Auth; //329ページで追加

    class HelloController extends Controller
    {
        public function index(Request $request) {
            $user = Auth::user();
            $sort = $request->sort;
            $items = Person::orderBy($sort,'asc')->Paginate(5);
            $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
            return view('hello.index',$param);
        }

        public function post(Request $request) {
            $items = DB::select('SELECT * FROM people');
            return view('hello.index',['items' => $items]);
        }
        public function add(Request $request) {
            return view('hello.add');
        }

        public function create(Request $request) {
            $param = [
                'name' => $request->name,
                'mail' => $request->mail,
                'age' => $request->age,
            ];

            // DB::insert('INSERT INTO people (name,mail,age) VALUES (:name, :mail, :age)',$param); //217ページでクエリビルダに変更
            DB::table('people')->insert($param);
            return redirect('/hello');
        }

        public function edit(Request $request) {
            // $item = DB::select('SELECT * FROM people WHERE id = :id',$param); //218ページで変更
            $item = DB::table('people')->where('id',$request->id)->first();
            if (empty($item)) {
                return redirect('/hello')->with('error', 'Record not found.');
            }
            return view('hello.edit',['form' => $item]); 
            //クエリビルダによってオブジェクトとして渡すので$item[0]の[0]が不要になった
        }

        public function update(Request $request) {
            $param = [
                'id' => $request->id,
                'name' => $request->name,
                'mail' => $request->mail,
                'age' => $request->age,
            ];
            // DB::update('UPDATE people SET name = :name,mail = :mail,age = :age WHERE id = :id',$param);
            //218ページでクエリビルダに変更
            DB::table('people')->where('id',$request->id)->update($param);
            return redirect('/hello');
        }

        public function del(Request $request) {
            // $item = DB::select('SELECT * FROM people WHERE id = :id', $param); //220ページで変更
            $item = DB::table('people')->where('id',$request->id)->first();
            return view('hello.del',['form' => $item]);
        }

        public function remove(Request $request) {
            // DB::delete('DELETE FROM people WHERE id = :id',$param); 220ページで変更
            DB::table('people')->where('id',$request->id)->delete();
            return redirect('/hello');
        }

        public function show(Request $request) {
            $id = $request->id;
            $item = DB::table('people')->where('id',$id)->first();
            if (empty($item)) {
                return redirect('/hello')->with('error', 'Record not found.');
            }
            return view('hello.show',['item' => $item]);
        }

        public function rest(Request $request) {
            return view('hello.rest');
        }

        public function ses_get(Request $request) {
            $ses_data = $request->session()->get('msg');
            return view('hello.session',['session_data' => $ses_data]);
        }

        public function ses_put(Request $request) {
            $msg = $request->input;
            $request->session()->put('msg',$msg);
            return redirect('hello/session');
        }

        public function getAuth(Request $request) {
            $param = ['message' => 'ログインしてください'];
            return view('hello.auth', $param);
        }

        public function postAuth(Request $request) {
            $email = $request->email;
            $password = $request->password;
            if ( Auth::attempt(['email' => $email,'password' => $password])) {
                $msg = 'ログインしました。(' . Auth::user()->name . ')';
                return redirect('/hello');
            } else {
                $msg = 'ログインに失敗しました。';
            }
            return view('hello.auth',['message' => $msg]);
        }
    }  