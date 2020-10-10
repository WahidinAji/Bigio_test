<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SurveyorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveyors')->insert([
            'name' => 'Surveyors One',
            'email' => 'surveyor@mail.com',
            'password' => Hash::make('123123'),
        ]);
    }
}
