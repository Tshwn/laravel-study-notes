<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //231ページで追加

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => '12',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@flower.jp',
            'age' => '34',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'sahiko',
            'mail' => 'sachiko@happy.jp',
            'age' => '56',
        ];
        DB::table('people')->insert($param);
    }
}
