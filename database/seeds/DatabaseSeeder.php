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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->command->info('INFO: Users table seeded');
        $this->call(SongsTableSeeder::class);
        $this->command->info('INFO: Songs table seeded');
        $this->call(PlaylistTableSeeder::class);
        $this->command->info('INFO: Playlist table seeded');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
