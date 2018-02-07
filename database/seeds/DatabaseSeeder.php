<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
      \App\Ticket::truncate();
      \App\User::truncate();
  
      $cantidadTickets = 100;
  
      factory(\App\Ticket::class,$cantidadTickets)->create();
  
    }
}
