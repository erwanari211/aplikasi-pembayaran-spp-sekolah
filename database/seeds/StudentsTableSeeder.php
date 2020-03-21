<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\StudentClass;
use App\Models\StudentSpp;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $spp = StudentSpp::first();
        $classes = StudentClass::get();

        foreach ($classes as $class) {
            for ($i=1; $i <= 10; $i++) {
                $user = new User;
                $user->name = $faker->name;
                $user->email = $faker->email;
                $user->password = bcrypt('12345678');
                $user->username = date('Y') . strtolower(str_random(8));
                $user->is_admin = false;
                $user->role = 'student';
                $user->save();

                $student = new Student;
                $student->user_id = $user->id;
                $student->student_class_id = $class->id;
                $student->student_spp_id = $spp->id;
                $student->code = $user->username;
                $student->phone = $faker->e164PhoneNumber;
                $student->address = $faker->address;
                $student->save();
            }
        }
    }
}
