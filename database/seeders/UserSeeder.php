<?php

namespace Database\Seeders;
use App\Models\User; 


use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => \bcrypt('password123')
        ];

        User::insert($user);
    }
}
