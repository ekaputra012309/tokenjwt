<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        $users = [
            [
                'name'=>'Javed Ur Rehman',
                'email'=>'javed@gmail.com',
                'password'=> Hash::make('admin123')
            ],
            [
                'name'=>'Syed Ahsan Kamal',
                'email'=>'ahsan@gmail.com',
                'password'=> Hash::make('admin123')
            ],
            [
                'name'=>'Abdul Muqeet',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make('admin123')
            ]
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($users as $user){
            User::create($user);
        }
    }
}
