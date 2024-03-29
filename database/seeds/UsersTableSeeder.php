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
        //
        User::create([
        	'name'=>'Juan',
        	'email'=>'juan@juan.com',
        	'password'=>bcrypt('12341234'),
            'admin'=>true,
        ]);

        //Si quisiera crear 5 usuarios aparte de Juan
        factory(User::class, 5)->create();
    }
}
