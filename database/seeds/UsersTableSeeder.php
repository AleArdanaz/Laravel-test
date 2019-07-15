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
        User::create([
            'name' => "Alejo",
            'email' =>'alejo@gmail.com',
            'password' => bcrypt('1234')
          ]);

          User::create([
            'name' => "Pedro",
            'email' =>'pedro@gmail.com',
            'password' => bcrypt('1234')
          ]);

          User::create([
            'name' => "Sofia",
            'email' =>'sofia@gmail.com',
            'password' => bcrypt('1234')
          ]);

          User::create([
            'name' => "Arturo",
            'email' =>'arturo@gmail.com',
            'password' => bcrypt('1234')
          ]);
    }
}
