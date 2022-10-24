<?php

namespace Database\Seeders;

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
        DB::table('categories')->insert([
            [
                'category' => 'Adventure',
                'remarks' => 'lorem'
            ],
            [
                'category' => 'Business',
                'remarks' => 'lorem'
            ],
            [
                'category' => 'Comedy',
                'remarks' => 'lorem'
            ],
            [
                'category' => 'Drama',
                'remarks' => 'lorem'
            ],
            [
                'category' => 'Horror',
                'remarks' => 'lorem'
            ],
            [
                'category' => 'Politics',
                'remarks' => 'lorem'
            ],
            [
                'category' => 'Religion',
                'remarks' => 'lorem'
            ],
            [
                'category' => 'Romance',
                'remarks' => 'lorem'
            ]
        ]);
    }
}
