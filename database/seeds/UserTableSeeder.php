<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\User::create([
      'name' => 'Gustavo',
      'email' => 'gustavo@maciel.com.br',
      'password' => bcrypt('123')

      ]);
    }
}
