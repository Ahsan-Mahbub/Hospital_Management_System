<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Admin User',
                'email'=>'admin@itsolutionstuff.com',
                'role'=>'admin',
                'password'=> bcrypt('12345678'),
             ],
             [
                'name'=>'Doctor',
                'email'=>'doctor@gmail.com',
                'role'=>'doctor',
                'password'=> bcrypt('12345678'),
                'user_id' => 1
             ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}