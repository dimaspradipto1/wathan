<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' =>'admin',
        //     'email'=> 'admin@gmail.com',
        //     'password'=> Hash::make('password'),
        //     'is_admin'=>true,
        //     'created_at' =>now(),
        //     'updated_at'=>now()  
        // ]);

        $users = [
            [
                'name' =>'admin',
                'email'=> 'admin@gmail.com',
                'password'=> Hash::make('ubahsaya'),
                'is_admin'=>true,
                'is_guru'=>false,
                'created_at' =>now(),
                'updated_at'=>now()  
            ],
            [
                'name' =>'guru',
                'email'=> 'guru@gmail.com',
                'password'=> Hash::make('ubahsaya'),
                'is_admin'=>false,
                'is_guru'=>true,
                'created_at' =>now(),
                'updated_at'=>now()  
            ]  
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
