<?php

use Illuminate\Database\Seeder;
use App\Models\StudentClass;

class StudentClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rpl1 = new StudentClass;
        $rpl1->name = 'RPL-1';
        $rpl1->major = 'RPL';
        $rpl1->save();

        $rpl2 = new StudentClass;
        $rpl2->name = 'RPL-2';
        $rpl2->major = 'RPL';
        $rpl2->save();

        $tkj1 = new StudentClass;
        $tkj1->name = 'TKJ-1';
        $tkj1->major = 'TKJ';
        $tkj1->save();

        $tkj2 = new StudentClass;
        $tkj2->name = 'TKJ-2';
        $tkj2->major = 'TKJ';
        $tkj2->save();
    }
}
