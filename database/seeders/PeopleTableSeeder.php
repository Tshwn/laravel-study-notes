<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //231ページで追加
use App\Models\Person;

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
        $person = new Person;
        $person->fill($param)->save();

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@flower.jp',
            'age' => '34',
        ];
        $person = new Person;
        $person->fill($param)->save();

        $param = [
            'name' => 'sahiko',
            'mail' => 'sachiko@happy.jp',
            'age' => '56',
        ];
        $person = new Person;
        $person->fill($param)->save();
    }
}
