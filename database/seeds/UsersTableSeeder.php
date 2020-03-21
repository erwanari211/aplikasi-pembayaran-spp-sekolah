<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'Admin';
        $admin->email = 'admin@app.com';
        $admin->password = bcrypt('12345678');
        $admin->username = 'admin';
        $admin->is_admin = true;
        $admin->role = 'admin';
        $admin->save();

        $operator = new User;
        $operator->name = 'operator';
        $operator->email = 'operator@app.com';
        $operator->password = bcrypt('12345678');
        $operator->username = 'operator';
        $operator->is_admin = true;
        $operator->role = 'operator';
        $operator->save();
    }
}
