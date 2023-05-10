<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Nasma Test',
            'email'    => 'nsmnajeeb@gmail.com',
            'password'   =>  Hash::make('password'),
            'remember_token' =>  Str::random(10)
        ]);
    }
}
