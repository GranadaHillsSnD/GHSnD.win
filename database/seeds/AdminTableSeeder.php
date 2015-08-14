<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Admins;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Admins::create([
        'name' => 'Cory Cunanan',
        'email' => 'ccoryc@gmail.com',
        'password' => bcrypt('hanspree')
      ]);
    }
}
