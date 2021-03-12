<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Illuminate\Support\Facades\Hash;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         // Let's clear the users table first
         Admin::truncate();

 
         Admin::create([
             'name' => 'Administrator',
             'email' => 'm@m.com',
             'password' => Hash::make('asdfasdf'),
         ]);

    }
}
