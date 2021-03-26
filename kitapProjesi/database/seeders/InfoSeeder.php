<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('info')->insert([

            'userid'=>1,
            'job'=>'php developer',
            'school'=>'sdü'
        
        ]);
    }
}
