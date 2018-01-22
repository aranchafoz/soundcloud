<?php

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
      DB::table('users')->truncate();

      DB::table('users')->insert([
        'nick' => 'Jesulin95',
        'name' => 'Jesulín de Ubrique',
        'email' => 'jesulin@hotmail.com',
        'password' => bcrypt('123'),
        'location' => 'Spain',
        'description' => 'Gran torero'
        ]);

        DB::table('users')->insert([
          'nick' => 'TheLoCoXs',
          'name' => 'Jaume',
          'email' => 'locoxs95@gmail.com',
          'password' => bcrypt('123'),
          'location' => 'Spain',
          'description' => 'Que pasa que vols'
        ]);

        DB::table('users')->insert([
          'nick' => 'afoz11',
          'name' => 'Arancha',
          'surname' => 'Ferrero Rocher',
          'email' => 'aranchafoz@gmail.com',
          'password' => bcrypt('123'),
          'location' => 'Spain',
          'description' => 'De las baskongadas con amor'
        ]);
    }
}
