<?php

use Illuminate\Database\Seeder;

class PlaylistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('playlists')->truncate();
        DB::table('playlists')->insert([
          'name' => 'Pachangueo',
          'user_id' => '2',
          'private' => rand(0, 1),
          'image' => 'public/pachangueo.jpg'
        ]);
        DB::table('playlists')->insert([
          'name' => 'Festa',
          'user_id' => '2',
          'private' => rand(0, 1),
          'image' => 'public/festa.jpg'
        ]);

        factory(App\SongPlaylist::class, 50)->create();
    }
}
