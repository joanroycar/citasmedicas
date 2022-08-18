<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Joan Roy',
            'email' => 'joanroycar@gmail.com',
            'email_verified_at' => now(),
            'password' => ('123456789'), // password
            'cedula'=>'04123322',
            'address'=>'Av. Tulipanes',
            'phone'=>'20335648',
            'role'=>'admin'
        


         ]
        );



        User::factory()
        ->count(10)
        ->create();
    }
}
