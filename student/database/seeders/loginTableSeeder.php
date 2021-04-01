<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class loginTableSeeder extends Seeder
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
            'name' => 'John Smith',
            'email' => 'santhosh@gmail.com',
            'password' =>\Hash::make('password'),  
        ]);
       
    }
}
