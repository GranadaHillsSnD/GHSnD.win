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
      Admins::create([
        'name' => 'Gurbir Singh',
        'email' => 'g27963@student.ghchs.com',
        'password' => bcrypt('droppedmycase')
      ]);
      Admins::create([
        'name' => 'Vikas Chauhan',
        'email' => 'v27539@student.ghchs.com',
        'password' => bcrypt('gobigorgohome')
      ]);
      Admins::create([
        'name' => 'Mohib Jafri',
        'email'=> 'm27617@student.ghchs.com',
        'password' => bcrypt('butterisntbrown')
      ]);
    }
}
