<?php

use App\User;
use App\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            SurveyorSeeder::class,
            UserSeeder::class
        ]);
    }
}
