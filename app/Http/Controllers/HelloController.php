<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest; // 142pページで追加
use Illuminate\Foundation\Validation\ValidatesRequests; //165ページで追加
use Validator; // 144ページで追加
use Illuminate\Support\Facades\DB; // 192ページで追加

    class HelloController extends Controller
    {
        public function index(Request $request) {
            // $items = DB::select('SELECT * FROM people'); //205ページでクエリビルダに変更
            $items = DB::table('people')->get(); //205ページで追加
            return view('hello.index',['items' => $items]);
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

            DB::insert('INSERT INTO people (name,mail,age) VALUES (:name, :mail, :age)',$param);
            return redirect('/hello');
        }

        public function edit(Request $request) {
            $param = ['id' => $request->id];
            $item = DB::select('SELECT * FROM people WHERE id = :id',$param);
            if (empty($item)) {
                return redirect('/hello')->with('error', 'Record not found.');
            }
            return view('hello.edit',['form' => $item[0]]);
        }

        public function update(Request $request) {
            $param = [
                'id' => $request->id,
                'name' => $request->name,
                'mail' => $request->mail,
                'age' => $request->age,
            ];
            DB::update('UPDATE people SET name = :name,mail = :mail,age = :age WHERE id = :id',$param);
            return redirect('/hello');
        }

        public function del(Request $request) {
            $param = ['id' => $request->id];
            $item = DB::select('SELECT * FROM people WHERE id = :id', $param);
            return view('hello.del',['form' => $item[0]]);
        }

        public function remove(Request $request) {
            $param = [
                'id' => $request->id,
            ];
            DB::delete('DELETE FROM people WHERE id = :id',$param);
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
    }  