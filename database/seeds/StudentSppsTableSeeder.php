<?php

use Illuminate\Database\Seeder;
use App\Models\StudentSpp;

class StudentSppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spp = new StudentSpp;
        $spp->year = date('Y');
        $spp->amount = 100000;
        $spp->save();
    }
}
