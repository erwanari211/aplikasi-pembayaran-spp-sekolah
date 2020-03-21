<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(StudentClassesTableSeeder::class);
        $this->call(StudentSppsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
    }
}
