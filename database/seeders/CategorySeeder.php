<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['genre' => 'World'],
            ['genre' => 'Travel'],
            ['genre' => 'Sports'],
            ['genre' => 'Business'],
            ['genre' => 'Health'],
            ['genre' => 'Tech'],
            ['genre' => 'Entertainment'],
            ['genre' => 'Style'],
            ['genre' => 'Features'],
            ['genre' => 'Politics'],
            ['genre' => 'More']
        ];
        DB::table('categories')->insert($data);
    }
}
