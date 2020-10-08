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
        User::updateOrCreate(
            ['email' => 'caloggero.a@gmail.com', 'name' => 'acali'],
            ['password' => Hash::make('alexc781')]
        );
    }
}
