<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'id' => '1',
            'person_id' => '1',
            'title' => 'tarosan',
            'message' => 'taroyamada',
        ];
        DB::table('boards')->insert($param);

        $param = [
            'id' => '2',
            'person_id' => '2',
            'title' => 'hanakosan',
            'message' => 'hanakoflower',
        ];
        DB::table('boards')->insert($param);

        $param = [
            'id' => '3',
            'person_id' => '3',
            'title' => 'sachikosan',
            'message' => 'sachikohappy',
        ];
        DB::table('boards')->insert($param);
    }
}
